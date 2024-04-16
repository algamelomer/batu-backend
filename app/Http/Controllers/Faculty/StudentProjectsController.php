<?php

namespace App\Http\Controllers\Faculty;

use App\Models\StudentProjects;
use App\Models\Department;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use App\Traits\CrudOperationsTrait;
use App\Traits\HandleFile;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Database\QueryException;

class StudentProjectsController extends Controller
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
            'name' => 'required|string',
            'description' => 'nullable|string',
            'image' => 'required',
            'file' => 'nullable|file',
            'team_name' => 'required|string',
            'department_id' => 'required|exists:departments,id',
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
            $studentProjects = $this->getRecord(new StudentProjects, 'id', 'name', 'description', 'file', 'image', 'team_name', 'department_id','faculty_id');
            return response()->json(['data' => $studentProjects], 200);
        } catch (QueryException $e) {
            return response()->json(['error' => 'Database error', 'details' => 'Failed to fetch student projects. Please try again later.'], 500);
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

            $data = $request->only(['name', 'description', 'team_name', 'department_id']);
            $data['faculty_id'] = $this->getForeignKey(new Department, 'faculty_id', $request->department_id);
            $data['image'] = $this->createFile($request, 'image', $request->name, 'image');

            if ($request->hasFile('file')) {
                $data['file'] = $this->createFile($request, 'file', $request->name, 'file');
            }

            $studentProject = $this->createRecord(new StudentProjects, $data);

            return response()->json(['data' => $studentProject, 'message' => 'Student Project created successfully'], 201);
        } catch (QueryException $e) {
            return response()->json(['error' => 'Database error', 'details' => 'Failed to create student project. Please try again later.'], 500);
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
            $studentProject = $this->findById(new StudentProjects, $id);
            return response()->json(['data' => $studentProject], 200);
        } catch (ModelNotFoundException $e) {
            return response()->json(['error' => 'Record not found', 'details' => 'The requested student project was not found.'], 404);
        } catch (QueryException $e) {
            return response()->json(['error' => 'Database error', 'details' => 'Failed to fetch student project details. Please try again later.'], 500);
        }
    }

    /*
    |--------------------------------------------------------------------------
    | Update Function
    |--------------------------------------------------------------------------
    */
    public function update(Request $request, StudentProjects $studentProject)
    {
        try {
            $validationResult = $this->validator($request);
            if ($validationResult !== null) {
                return $validationResult;
            }

            $data = $request->only(['name', 'description', 'team_name', 'department_id']);
            $data['faculty_id'] = $this->getForeignKey(new Department, 'faculty_id', $request->department_id);
            $data['image'] = $this->updateFile($request, 'image', $studentProject->image, $request->name, 'image');

            if ($request->hasFile('file')) {
                $data['file'] = $this->updateFile($request, 'file', $studentProject->file, $request->name, 'file');
            }

            $studentProject = $this->updateRecord(new StudentProjects, $studentProject->id, $data);

            return response()->json(['data' => $studentProject, 'message' => 'Student Project updated successfully'], 200);
        } catch (ModelNotFoundException $e) {
            return response()->json(['error' => 'Record not found', 'details' => 'The requested student project was not found.'], 404);
        } catch (QueryException $e) {
            return response()->json(['error' => 'Database error', 'details' => 'Failed to update student project. Please try again later.'], 500);
        }
    }

    /*
    |--------------------------------------------------------------------------
    | Destroy Function
    |--------------------------------------------------------------------------
    */
    public function destroy(StudentProjects $studentProject)
    {
        try {
            return $this->deleteRecord($studentProject, 'image', 'file');
        } catch (QueryException $e) {
            return response()->json(['error' => 'Database error', 'details' => 'Failed to delete student project. Please try again later.'], 500);
        }
    }
}
