<?php

namespace App\Http\Controllers\Faculty;

use App\Http\Controllers\Controller;
use App\Models\Department;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Traits\CrudOperationsTrait;
use App\Traits\HandleFile;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Database\QueryException;

class DepartmentController extends Controller
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
            'description_video' => 'nullable|string',
            'image' => 'required',
            'logo' => 'required',
            'video' => 'nullable',
            'vision'=>'nullable',
            'mission'=>'nullable',
            'job_opportunities' => 'nullable',
            'faculty_id' => 'required|exists:faculties,id',
            'user_id' => 'required|exists:users,id',
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
            $departments = $this->getRecord(new Department, 'id', 'name', 'description', 'description_video', 'vision', 'mission', 'image', 'logo', 'video', 'job_opportunities', 'faculty_id', 'user_id');
            return response()->json(['departments' => $departments], 200);
        } catch (QueryException $e) {
            return response()->json(['error' => 'Database error', 'details' => 'Failed to fetch departments. Please try again later.'], 500);
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
            $data = $request->only(['name', 'description', 'job_opportunities', 'description_video',  'vision', 'mission', 'faculty_id', 'user_id']);
            $data['image'] = $this->createFile($request, 'image', $request->name, 'image');
            $data['logo'] = $this->createFile($request, 'logo', $request->name, 'image');
            $data['video'] = $this->createFile($request, 'video', $request->name, 'video');

            $department = $this->createRecord(new Department, $data);

            return response()->json(['department' => $department, 'message' => 'Department created successfully'], 201);
        } catch (QueryException $e) {
            return response()->json(['error' => 'Database error', 'details' => 'Failed to create department. Please try again later.'], 500);
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
            $department = $this->findById(new Department, $id);
            $supervisor = $department->supervisoryTeam;
            $studyProjects = $department->studentProjects;
            $staff = $department->facultyMember;
            $studyPlan = $department->studyPlan;
            return response()->json(['department' => $department], 200);
        } catch (ModelNotFoundException $e) {
            return response()->json(['error' => 'Record not found', 'details' => 'The requested department was not found.'], 404);
        }
    }

    /*
    |--------------------------------------------------------------------------
    | Update Function
    |--------------------------------------------------------------------------
    */
    public function update(Request $request, Department $department)
    {
        try {
            $validationResult = $this->validator($request);
            if ($validationResult !== null) {
                return $validationResult;
            }

            $data = $request->only(['name', 'description', 'description_video', 'vision', 'mission',  'job_opportunities', 'faculty_id', 'user_id']);

            $data['image'] = $this->updateFile($request, 'image', $department->image, $request->name, 'image');
            $data['logo'] = $this->updateFile($request, 'logo', $department->logo, $request->name, 'image');
            $data['video'] = $this->updateFile($request, 'video', $department->video, $request->name, 'video');

            $updatedDepartment = $this->updateRecord(new Department, $department->id, $data);
            return response()->json(['department' => $updatedDepartment, 'message' => 'Department updated successfully'], 200);
        } catch (ModelNotFoundException $e) {
            return response()->json(['error' => 'Record not found', 'details' => 'The requested department was not found.'], 404);
        } catch (QueryException $e) {
            return response()->json(['error' => 'Database error', 'details' => 'Failed to update department. Please try again later.'], 500);
        }
    }

    /*
    |--------------------------------------------------------------------------
    | Destroy Function
    |--------------------------------------------------------------------------
    */
    public function destroy(Department $department)
    {
        try {
            return $this->deleteRecord($department, 'image', 'video');
        } catch (QueryException $e) {
            return response()->json(['error' => 'Database error', 'details' => 'Failed to delete department. Please try again later.'], 500);
        }
    }
}
