<?php

namespace App\Http\Controllers\Faculty;

use App\Models\Faculty;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Department;
use Illuminate\Support\Facades\Validator;
use App\Traits\CrudOperationsTrait;
use App\Traits\HandleFile;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Database\QueryException;

class FacultyController extends Controller
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
            'image' => 'nullable',
            'logo' => 'required',
            'video' => 'nullable',
            'description_video' => 'nullable|string',
            'description' => 'nullable|string',
            'vision' => 'nullable|string',
            'mission' => 'nullable|string',
            'user_id' => 'required|exists:users,id',
        ];
        return $this->validateRequestData($request, $rules);
    }

    /*
    |--------------------------------------------------------------------------
    | Details Faculty Function
    |--------------------------------------------------------------------------
    */
    public function detailsFaculty()
    {
        try {
            // Get all faculties with their departments
            $faculties = Faculty::with(['department:id,name,faculty_id'])->select('id', 'name')->get();

            return response()->json(['data' => $faculties], 200);
        } catch (QueryException $e) {
            return response()->json(['error' => 'Database error', 'details' => 'Failed to fetch faculty details. Please try again later.'], 500);
        }
    }

    /*
    |--------------------------------------------------------------------------
    | Index Function
    |--------------------------------------------------------------------------
    */
    public function index()
    {
        try {
            $faculties = $this->getRecord(new Faculty, 'id', 'name', 'logo', 'image', 'video', 'description', 'description_video', 'vision', 'mission', 'user_id');
            return response()->json(['data' => $faculties], 200);
        } catch (QueryException $e) {
            return response()->json(['error' => 'Database error', 'details' => 'Failed to fetch faculties. Please try again later.'], 500);
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
            $faculty = $this->findById(new Faculty, $id);
            $departments = $faculty->department()->select('id', 'name', 'description', 'logo')->get();
            $projects = collect();

            foreach ($departments as $department) {
                if ($department->faculty_id == $id) {
                    $departmentProjects = $department->studentProjects()->limit(2)->get();
                    if (!$departmentProjects->isEmpty()) {
                        $projects = $projects->merge($departmentProjects);
                    }
                }
            }

            $supervisor = $faculty->supervisoryTeams;
            $facultyMember = $faculty->facultyMember;

            return response()->json(['faculty' => $faculty, 'departments' => $departments, 'projects' => $projects], 200);
        } catch (ModelNotFoundException $e) {
            return response()->json(['error' => 'Record not found', 'details' => 'The requested faculty was not found.'], 404);
        } catch (QueryException $e) {
            return response()->json(['error' => 'Database error', 'details' => 'Failed to fetch faculty details. Please try again later.'], 500);
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

            $data = $request->only(['name', 'description', 'description_video', 'vision', 'mission', 'user_id']);
            $data['logo'] = $this->createFile($request, 'logo', $request->name, 'image');
            $data['image'] = $this->createFile($request, 'image', $request->name, 'image');
            $data['video'] = $this->createFile($request, 'video', $request->name, 'video');

            $faculty = $this->createRecord(new Faculty, $data);

            return response()->json(['data' => $faculty, 'message' => 'Faculty created successfully'], 201);
        } catch (QueryException $e) {
            return response()->json(['error' => 'Database error', 'details' => 'Failed to create faculty. Please try again later.'], 500);
        }
    }

    /*
    |--------------------------------------------------------------------------
    | Update Function
    |--------------------------------------------------------------------------
    */
    public function update(Request $request, Faculty $faculty)
    {
        try {
            $validationResult = $this->validator($request);
            if ($validationResult !== null) {
                return $validationResult;
            }

            $data = $request->only(['name', 'description', 'description_video', 'vision', 'mission', 'user_id']);
            $data['logo'] = $this->updateFile($request, 'logo', $faculty->image, $request->name, 'image');
            $data['image'] = $this->updateFile($request, 'image', $faculty->image, $request->name, 'image');
            $data['video'] = $this->updateFile($request, 'video', $faculty->video, $request->name, 'video');

            $faculty = $this->updateRecord(new Faculty, $faculty->id, $data);

            return response()->json(['data' => $faculty, 'message' => 'Faculty updated successfully'], 200);
        } catch (ModelNotFoundException $e) {
            return response()->json(['error' => 'Record not found', 'details' => 'The requested faculty was not found.'], 404);
        } catch (QueryException $e) {
            return response()->json(['error' => 'Database error', 'details' => 'Failed to update faculty. Please try again later.'], 500);
        }
    }

    /*
    |--------------------------------------------------------------------------
    | Destroy Function
    |--------------------------------------------------------------------------
    */
    public function destroy(Faculty $faculty)
    {
        try {
            return $this->deleteRecord($faculty, 'video', 'image', 'logo');
        } catch (QueryException $e) {
            return response()->json(['error' => 'Database error', 'details' => 'Failed to delete faculty. Please try again later.'], 500);
        }
    }
}
