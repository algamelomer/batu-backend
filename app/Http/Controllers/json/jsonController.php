<?php

namespace App\Http\Controllers\Json;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
use App\Traits\HandleFileJson;

class JsonController extends Controller
{
    use HandleFileJson;

    /*
    |--------------------------------------------------------------------------
    | JSON File Path
    |--------------------------------------------------------------------------
    */
    private $jsonFilePath = '/dataInterface/dataInterface.json';

    /*
    |--------------------------------------------------------------------------
    | Index Function
    |--------------------------------------------------------------------------
    */
    public function index()
    {
        try {
            $jsonData = $this->getAllJsonData($this->jsonFilePath);
            return response()->json($jsonData, 200);
        } catch (\Exception $e) {
            return response()->json(['error' => 'Failed to fetch JSON data'], 500);
        }
    }

    /*
    |--------------------------------------------------------------------------
    | Store Function
    |--------------------------------------------------------------------------
    */
    public function store(Request $request, string $category)
    {
        try {
            $newItem = $this->createJsonItem($this->jsonFilePath, $request, $category);
            return response()->json($newItem, 201);
        } catch (\Exception $e) {
            return response()->json(['error' => 'Failed to create JSON item'], 500);
        }
    }

    /*
    |--------------------------------------------------------------------------
    | Show Function
    |--------------------------------------------------------------------------
    */
    public function show(string $category, string $title)
    {
        try {
            $item = $this->findJsonItem($this->jsonFilePath, $category, $title);
            if ($item) {
                return response()->json($item, 200);
            }
            return response()->json(['error' => 'Item not found'], 404);
        } catch (\Exception $e) {
            return response()->json(['error' => 'Failed to fetch JSON item'], 500);
        }
    }

    /*
    |--------------------------------------------------------------------------
    | Update Function
    |--------------------------------------------------------------------------
    */
    public function update(Request $request, string $category, string $title)
    {
        try {
            $item = $this->updateJsonItem($this->jsonFilePath, $request, $category, $title);
            if ($item) {
                return response()->json($item, 200);
            }
            return response()->json(['error' => 'Item not found'], 404);
        } catch (\Exception $e) {
            return response()->json(['error' => 'Failed to update JSON item'], 500);
        }
    }

    /*
    |--------------------------------------------------------------------------
    | Destroy Function
    |--------------------------------------------------------------------------
    */
    public function destroy(string $category, string $title)
    {
        try {
            $item = $this->deleteJsonItem($this->jsonFilePath, $category, $title);
            if ($item) {
                $itemName = basename($item['image']);
                $imagePath = public_path('assets/images/' . $itemName);
                if (file_exists($imagePath)) {
                    unlink($imagePath);
                }
                return response()->json(['message' => 'Item and image deleted successfully'], 200);
            }
            return response()->json(['error' => 'Item not found'], 404);
        } catch (\Exception $e) {
            return response()->json(['error' => 'Failed to delete JSON item'], 500);
        }
    }
}
