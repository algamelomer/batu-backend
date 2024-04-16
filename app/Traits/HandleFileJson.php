<?php

namespace App\Traits;

use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;

trait HandleFileJson
{
    use HandleFile;

    /*
    |--------------------------------------------------------------------------
    | Json File Path
    |--------------------------------------------------------------------------
    */
    private $jsonFilePath = '/dataInterface/dataInterface.json';
    /*
    |--------------------------------------------------------------------------
    | Function For Getting Data From JSON file
    |--------------------------------------------------------------------------
    */
    public function getAllJsonData($jsonFilePath)
    {
        $data = $this->readJsonFile($jsonFilePath);
        return response()->json($data);
    }

    private function readJsonFile($jsonFilePath)
    {
        $jsonContents = Storage::get($jsonFilePath);
        return json_decode($jsonContents, true) ?: [];
    }

    /*
    |--------------------------------------------------------------------------
    | Function To Show JSON Data
    |--------------------------------------------------------------------------
    */
    public function show(string $category, string $title)
    {
        $item = $this->findJsonItem($this->jsonFilePath, $category, $title);
        if ($item) {
            return response()->json($item);
        }
        return response()->json(['error' => 'Item not found'], 404);
    }

    private function findJsonItem($jsonFilePath, $category, $title)
    {
        $data = $this->readJsonFile($jsonFilePath);
        if ($this->itemExists($data, $category, $title)) {
            $item = $this->findItemByTitle($data, $category, $title);
            return $item;
        }
        return null;
    }

    /*
    |--------------------------------------------------------------------------
    | Function To Create JSON Item
    |--------------------------------------------------------------------------
    */
    public function createJsonItem($jsonFilePath, Request $request, $category)
    {
        $this->validateRequest($request);
        $data = $this->readJsonFile($jsonFilePath);
        $newItem = $request->only(['title', 'description', 'counter_number']);

        if ($request->hasFile('image')) {
            $newItem['image'] = $this->createFile($request, 'image', $request->input('title'), 'image');
        }

        $this->initializeCategoryIfNotExists($data, $category);
        $data[$category][] = $newItem;
        $this->writeToJsonFile($data);

        return response()->json($newItem, 201);
    }

    /*
    |--------------------------------------------------------------------------
    | Function To Update JSON Item
    |--------------------------------------------------------------------------
    */
    public function updateJsonItem($jsonFilePath, Request $request, $category, $title)
    {
        $this->validateRequest($request);

        $data = $this->readJsonFile($jsonFilePath);
        if ($this->itemExists($data, $category, $title)) {
            $item = $this->findItemByTitle($data, $category, $title);
            $updatedItem = array_merge($item, $request->only(['title', 'description', 'counter_number']));

            if ($request->hasFile('image')) {
                $updatedItem['image'] = $this->updateFile($request, 'image', $item['image'], $request->input('title'), 'image');
            }

            $index = array_search($item, $data[$category], true);
            $data[$category][$index] = $updatedItem;
            $this->writeToJsonFile($data);
            return $updatedItem;
        }
        return null;
    }

    /*
    |--------------------------------------------------------------------------
    | Function To Delete JSON Item
    |--------------------------------------------------------------------------
    */
    public function destroy(string $category, string $title)
    {
        $item = $this->deleteJsonItem($this->jsonFilePath, $category, $title);
        if ($item) {
            return response()->json(['message' => 'Item deleted successfully']);
        }
        return response()->json(['error' => 'Item not found'], 404);
    }

    private function deleteJsonItem($jsonFilePath, $category, $title)
    {
        $data = $this->readJsonFile($jsonFilePath);
        if ($this->itemExists($data, $category, $title)) {
            $item = $this->findItemByTitle($data, $category, $title);
            $index = array_search($item, $data[$category], true);
            array_splice($data[$category], $index, 1);
            $this->writeToJsonFile($data);
            return $item;
        }
        return null;
    }

    /*
    |--------------------------------------------------------------------------
    | Helper Functions
    |--------------------------------------------------------------------------
    */

    private function validateRequest(Request $request)
    {
        return $request->validate([
            'title' => 'required|string',
            'description' => 'required|string',
            'image' => 'required|file',
            'counter_number' => 'nullable|integer',
        ]);
    }

    private function initializeCategoryIfNotExists(&$data, $category)
    {
        if (!isset($data[$category])) {
            $data[$category] = [];
        }
    }

    private function itemExists($data, $category, $title)
    {
        return isset($data[$category]) && $this->findItemByTitle($data, $category, $title) !== null;
    }

    private function findItemByTitle($data, $category, $title)
    {
        foreach ($data[$category] as $item) {
            if ($item['title'] === $title) {
                return $item;
            }
        }
        return null;
    }

    private function writeToJsonFile($data)
    {
        Storage::put($this->jsonFilePath, json_encode($data, JSON_PRETTY_PRINT));
    }
}
