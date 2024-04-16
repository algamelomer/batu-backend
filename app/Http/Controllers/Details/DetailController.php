<?php

namespace App\Http\Controllers\Details;

use App\Http\Controllers\Controller;
use App\Models\Detail;
use Illuminate\Http\Request;
use App\Traits\CrudOperationsTrait;
use App\Traits\HandleFile;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Database\QueryException;

class DetailController extends Controller
{
    use CrudOperationsTrait;
    use HandleFile;

    /*
    |--------------------------------------------------------------------------
    | Validate Request Data Function
    |--------------------------------------------------------------------------
    */
    private function validator($request)
    {
        $rules = [
            'title' => 'required|string',
            'image' => 'nullable',
            'description' => 'nullable|string',
            'counter_number' => 'nullable|integer',
            'category' => 'required|in:activity,counter',
        ];
        return $this->validateRequestData($request, $rules);
    }

    /*
    |--------------------------------------------------------------------------
    | Index Function
    |--------------------------------------------------------------------------
    */
    public function index()
    {
        try {
            $detail = $this->getRecord(new Detail, 'id', 'title', 'image', 'description', 'category', 'counter_number');

            $data = [
                'activity' => [],
                'counter' => [],
            ];

            foreach ($detail as $item) {
                $data[$item->category][] = $item;
            }

            return response()->json(['details' => $data], 200);
        } catch (ModelNotFoundException $e) {
            return response()->json(['error' => 'Record not found', 'details' => 'The requested record was not found.'], 404);
        } catch (QueryException $e) {
            return response()->json(['error' => 'Database error', 'details' => 'Failed to fetch record. Please try again later.'], 500);
        }
    }

    /*
    |--------------------------------------------------------------------------
    | Show Function
    |--------------------------------------------------------------------------
    */
    public function show($id)
    {
        try {
            $detail = $this->findById(new Detail, $id);
            return response()->json(['data' => $detail], 200);
        } catch (ModelNotFoundException $e) {
            return response()->json(['error' => 'Record not found', 'details' => 'The requested record was not found.'], 404);
        }
    }

    /*
    |--------------------------------------------------------------------------
    | Store Function
    |--------------------------------------------------------------------------
    */
    public function store(Request $request)
    {
        try {
            $validationResult = $this->validator($request);
            if ($validationResult !== null) {
                return $validationResult;
            }
            $data = $request->only(['title', 'description', 'category', 'counter_number']);
            if ($request->hasFile('image')) {
                $data['image'] = $this->createFile($request, 'image', $request->name, 'image');
            }

            $detail = $this->createRecord(new Detail, $data);
            return response()->json(['data' => $detail, 'message' => 'Data About University created successfully'], 201);
        } catch (QueryException $e) {
            return response()->json(['error' => 'Database error', 'details' => 'Failed to create record. Please try again later.'], 500);
        }
    }
    /*
    |--------------------------------------------------------------------------
    | Update Function
    |--------------------------------------------------------------------------
    */
    public function update(Request $request, detail $detail)
    {
        try {
            $validationResult = $this->validator($request);
            if ($validationResult !== null) {
                return $validationResult;
            }
            $data = $request->only(['title', 'description', 'category', 'counter_number']);
            if ($request->hasFile('image')) {
                $data['image'] = $this->updateFile($request, 'image', $detail->image, $request->name, 'image');
            }

            $detail = $this->updateRecord(new Detail, $detail->id, $data);
            return response()->json(['data' => $detail, 'message' => 'Data About University updated successfully'], 201);
        } catch (ModelNotFoundException $e) {
            return response()->json(['error' => 'Record not found', 'details' => 'The requested record was not found.'], 404);
        } catch (QueryException $e) {
            return response()->json(['error' => 'Database error', 'details' => 'Failed to update record. Please try again later.'], 500);
        }
    }

    /*
    |--------------------------------------------------------------------------
    | Destroy Function
    |--------------------------------------------------------------------------
    */
    public function destroy(detail $detail)
    {
        try {
            return $this->deleteRecord($detail, 'image');
        } catch (QueryException $e) {
            return response()->json(['error' => 'Database error', 'details' => 'Failed to delete record. Please try again later.'], 500);
        }
    }
}
