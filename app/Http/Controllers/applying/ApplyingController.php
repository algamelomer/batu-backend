<?php

namespace App\Http\Controllers\applying;

use App\Http\Controllers\Controller;
use App\Models\Applying;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Database\QueryException;
use App\Traits\CrudOperationsTrait;
use App\Traits\HandleFile;

class ApplyingController extends Controller
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
            'description' => 'required|string',
            'image' => 'nullable|file',
            'category' => 'required|in:administrative,teaching_staff,other,head_section,head_page',
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
            $applyings = $this->getRecord(new Applying, 'id', 'title', 'description', 'image', 'category');

            $category = [
                'administrative' => [],
                'teaching_staff' => [],
                'other' => [],
                'head_section' => [],
                'head_page' => []
            ];

            foreach ($applyings as $applying) {
                $category[$applying->category][] = $applying;
            }

            return response()->json($category, 200);
        } catch (QueryException $e) {
            return response()->json(['error' => 'Database error', 'details' => 'Failed to fetch applyings. Please try again later.'], 500);
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

            $data = $request->only(['title', 'description', 'category']);
            $applying = $this->createRecord(new Applying, $data);

            $imagePath = null;
            if ($request->hasFile('image')) {
                $imagePath = $this->createFile($request, 'image', $request->title, 'image');
            }

            $applying->update(['image' => $imagePath]);

            return response()->json(['applying' => $applying, 'message' => 'Data has been created successfully'], 201);
        } catch (QueryException $e) {
            return response()->json(['error' => 'Database error', 'details' => 'Failed to create applying. Please try again later.'], 500);
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
            $applying = $this->findById(new Applying, $id);
            return response()->json(['applying' => $applying], 200);
        } catch (ModelNotFoundException $e) {
            return response()->json(['error' => 'Record not found', 'details' => 'The requested applying was not found.'], 404);
        } catch (QueryException $e) {
            return response()->json(['error' => 'Database error', 'details' => 'Failed to fetch applying details. Please try again later.'], 500);
        }
    }

    /*
    |--------------------------------------------------------------------------
    | Update Function
    |--------------------------------------------------------------------------
    */
    public function update(Request $request, Applying $applying)
    {
        try {
            $validationResult = $this->validator($request);
            if ($validationResult !== null) {
                return $validationResult;
            }

            $data = $request->only(['title', 'description', 'category']);
            $applying = $this->updateRecord(new Applying, $applying->id, $data);

            if ($request->hasFile('image')) {
                $imagePath = $this->updateFile($request, 'image', $applying->image, $request->title, 'image');
                $applying->update(['image' => $imagePath]);
            }

            return response()->json(['applying' => $applying, 'message' => 'Data has been modified successfully'], 200);
        } catch (QueryException $e) {
            return response()->json(['error' => 'Database error', 'details' => 'Failed to update applying. Please try again later.'], 500);
        }
    }

    /*
    |--------------------------------------------------------------------------
    | Destroy Function
    |--------------------------------------------------------------------------
    */
    public function destroy(Applying $applying)
    {
        try {
            return $this->deleteRecord($applying, 'image');
        } catch (QueryException $e) {
            return response()->json(['error' => 'Database error', 'details' => 'Failed to delete applying. Please try again later.'], 500);
        }
    }
}
