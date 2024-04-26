<?php

namespace App\Http\Controllers\Applying;

use App\Models\ApplyStudies;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Database\QueryException;
use App\Traits\CrudOperationsTrait;
use App\Traits\HandleFile;

class ApplyStudiesController extends Controller
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
            'image' => 'required',
            'graduate' => 'required|in:hight_school,industrial,industrial_institute',
            'user_id' => 'required|exists:users,id',
            'faculty_id' => 'required|exists:faculties,id',
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
            $staff = $this->getRecord(new ApplyStudies, ['id', 'title', 'description', 'image', 'graduate', 'faculty_id']);

            return response()->json(['data' => $staff], 200);
        } catch (ModelNotFoundException $e) {
            return response()->json(['error' => 'Record not found'], 404);
        } catch (QueryException $e) {
            return response()->json(['error' => 'Database error'], 500);
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
            $apply = $this->findById(new ApplyStudies, $id);

            return response()->json(['data' => $apply], 200);
        } catch (ModelNotFoundException $e) {
            return response()->json(['error' => 'Record not found'], 404);
        } catch (QueryException $e) {
            return response()->json(['error' => 'Database error'], 500);
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

            $data = $request->only(['title', 'description', 'graduate', 'user_id', 'faculty_id']);
            $data['image'] = $this->createFile($request, 'image', $request->title, 'image');

            $applyStudies = $this->createRecord(new ApplyStudies, $data);

            return response()->json(['data' => $applyStudies, 'message' => 'ApplyStudies created successfully'], 201);
        }  catch (ModelNotFoundException $e) {
            return response()->json(['error' => 'Record not found'], 404);
        } catch (QueryException $e) {
            return response()->json(['error' => 'Database error'], 500);
        }
    }

    /*
    |--------------------------------------------------------------------------
    | Update Function
    |--------------------------------------------------------------------------
    */
    public function update(Request $request, ApplyStudies $applyStudies)
    {
        try {
            $validationResult = $this->validator($request);
            if ($validationResult !== null) {
                return $validationResult;
            }

            $data = $request->only(['title', 'description', 'graduate', 'user_id', 'faculty_id']);
            $data['image'] = $this->updateFile($request, 'image', $applyStudies->image, $request->title, 'image');

            $applyStudies = $this->updateRecord(new ApplyStudies, $applyStudies->id, $data);

            return response()->json(['data' => $applyStudies, 'message' => 'ApplyStudies updated successfully'], 200);
        } catch (ModelNotFoundException $e) {
            return response()->json(['error' => 'Record not found'], 404);
        } catch (QueryException $e) {
            return response()->json(['error' => 'Database error'], 500);
        }
    }

    /*
    |--------------------------------------------------------------------------
    | Destroy Function
    |--------------------------------------------------------------------------
    */
    public function destroy(ApplyStudies $applyStudies)
    {
        try {
            return $this->deleteRecord($applyStudies, 'image');
        }  catch (ModelNotFoundException $e) {
            return response()->json(['error' => 'Record not found'], 404);
        } catch (QueryException $e) {
            return response()->json(['error' => 'Database error'], 500);
        }
    }
}
