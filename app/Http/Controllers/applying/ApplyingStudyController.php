<?php

namespace App\Http\Controllers\applying;

use App\Http\Controllers\Controller;
use App\Models\ApplyingStudy;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Database\QueryException;
use App\Traits\CrudOperationsTrait;
use App\Traits\HandleFile;

class ApplyingStudyController extends Controller
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
            'faculty' => 'required|string',
            'category' => 'required|in:university_requirements,head_section,head_page',
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
            $applyings = $this->getRecord(new ApplyingStudy, 'id', 'title', 'description', 'image', 'faculty', 'category');

            $category = [
                'university_requirements' => [],
                'head_section' => [],
                'head_page' => []
            ];

            foreach ($applyings as $applying) {
                $category[$applying->category][] = $applying;
            }

            return response()->json($category, 200);
        } catch (QueryException $e) {
            return response()->json(['error' => 'Database error', 'details' => 'Failed to fetch applying studies. Please try again later.'], 500);
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

            $data = $request->only(['title', 'description', 'faculty', 'category']);
            $applyingStudy = $this->createRecord(new ApplyingStudy, $data);

            $imagePath = null;
            if ($request->hasFile('image')) {
                $imagePath = $this->createFile($request, 'image', $request->title, 'image');
            }

            $applyingStudy->update(['image' => $imagePath]);

            return response()->json(['applying_study' => $applyingStudy, 'message' => 'Data has been created successfully'], 201);
        } catch (QueryException $e) {
            return response()->json(['error' => 'Database error', 'details' => 'Failed to create applying study. Please try again later.'], 500);
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
            $applyingStudy = $this->findById(new ApplyingStudy, $id);
            return response()->json(['applying_study' => $applyingStudy], 200);
        } catch (ModelNotFoundException $e) {
            return response()->json(['error' => 'Record not found', 'details' => 'The requested applying study was not found.'], 404);
        } catch (QueryException $e) {
            return response()->json(['error' => 'Database error', 'details' => 'Failed to fetch applying study details. Please try again later.'], 500);
        }
    }

    /*
    |--------------------------------------------------------------------------
    | Update Function
    |--------------------------------------------------------------------------
    */
    public function update(Request $request, ApplyingStudy $applyingStudy)
    {
        try {
            $validationResult = $this->validator($request);
            if ($validationResult !== null) {
                return $validationResult;
            }

            $data = $request->only(['title', 'description', 'faculty', 'category']);
            $applyingStudy = $this->updateRecord(new ApplyingStudy, $applyingStudy->id, $data);

            if ($request->hasFile('image')) {
                $imagePath = $this->updateFile($request, 'image', $applyingStudy->image, $request->title, 'image');
                $applyingStudy->update(['image' => $imagePath]);
            }

            return response()->json(['applying_study' => $applyingStudy, 'message' => 'Data has been modified successfully'], 200);
        } catch (QueryException $e) {
            return response()->json(['error' => 'Database error', 'details' => 'Failed to update applying study. Please try again later.'], 500);
        }
    }

    /*
    |--------------------------------------------------------------------------
    | Destroy Function
    |--------------------------------------------------------------------------
    */
    public function destroy(ApplyingStudy $applyingStudy)
    {
        try {
            return $this->deleteRecord($applyingStudy, 'image');
        } catch (QueryException $e) {
            return response()->json(['error' => 'Database error', 'details' => 'Failed to delete applying study. Please try again later.'], 500);
        }
    }
}
