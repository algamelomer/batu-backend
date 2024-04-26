<?php

namespace App\Http\Controllers\Faculty;

use App\Models\Faculty;
use App\Models\StudentProjects;
use App\Models\StaffPrograms;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Database\QueryException;
use App\Traits\HandleFile;
use App\Traits\CrudOperationsTrait;

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
            'image' => 'required',
            'logo' => 'required',
            'description' => 'required|string',
            'video' => 'nullable',
            'description_video' => 'nullable|string',
            'vision' => 'nullable|string',
            'mission' => 'nullable|string',
            'user_id' => 'required|exists:users,id',
        ];
        return $this->validateRequestData($request, $rules);
    }

    /*
    |--------------------------------------------------------------------------
    | Display Faculty Function
    |--------------------------------------------------------------------------
    */
    public function displayFaculty($id)
    {
        try {
            $faculty = $this->findWithRelation(new Faculty, ['department', 'facultyLeaders', 'staffMembers'], $id);

            // Handle faculty record
            $facultyData = $this->HandleRecord($faculty, ['id', 'name', 'image', 'logo', 'video', 'discription_video', 'vision', 'mission', 'user_id']);

            // Handle department record
            $department = $this->HandleRecord($faculty->department, ['id', 'name', 'description', 'logo', 'image', 'video', 'description_video', 'vision', 'mission', 'faculty_id', 'user_id']);

            // Handle facultyLeaders records
            $facultyLeaders = $this->HandleRecord($faculty->facultyLeaders, ['id', 'name', 'image', 'email', 'word', 'cv', 'position', 'category', 'faculty_id', 'user_id']);

            // Handle staffMembers records
            $staffMembers = $this->HandleRecord($faculty->staffMembers, ['id', 'name', 'image', 'email', 'description', 'cv', 'position', 'user_id', 'faculty_id', 'department_id']);

            // Handle StaffPrograms records
            $StaffPrograms = $this->HandleRecord(StaffPrograms::where('department_id', $faculty->department->pluck('id')->first())->take(2)->get(), ['id', 'name', 'description', 'image', 'file', 'team_name', 'user_id', 'department_id']);

            // Handle departmentProjects records
            $departmentProjects = $this->HandleRecord(StudentProjects::where('department_id', $faculty->department->pluck('id')->first())->take(2)->get(), ['id', 'name', 'description', 'image', 'file', 'team_name', 'user_id', 'department_id']);

            // Merge staff members and staff programs
            $member = array_merge($staffMembers, $StaffPrograms);

            return response()->json(['faculty' => $facultyData, 'department' => $department, 'facultyLeaders' => $facultyLeaders, 'staffMember' => $member, 'projects' => $departmentProjects], 200);
        } catch (ModelNotFoundException $e) {
            return response()->json(['error' => 'Record not found'], 404);
        } catch (QueryException $e) {
            return response()->json(['error' => 'Database error'], 500);
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
            $departments = $this->getRecord(new Faculty, ['id', 'name', 'logo', 'description']);
            return response()->json(['data' => $departments], 200);
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
            $faculty = $this->findById(new Faculty, $id);

            return response()->json(['data' => $faculty], 200);
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

            $data = $request->only(['name', 'description', 'description_video', 'vision', 'mission', 'user_id']);
            $data['logo'] = $this->createFile($request, 'logo', $request->name, 'image');
            $data['image'] = $this->createFile($request, 'image', $request->name, 'image');
            $data['video'] = $this->createFile($request, 'video', $request->name, 'video');

            $faculty = $this->createRecord(new Faculty, $data);

            return response()->json(['data' => $faculty, 'message' => 'Faculty created successfully'], 201);
        } catch (ModelNotFoundException $e) {
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
    public function destroy(Faculty $faculty)
    {
        try {
            return $this->deleteRecord($faculty, 'video', 'image', 'logo');
        } catch (ModelNotFoundException $e) {
            return response()->json(['error' => 'Record not found'], 404);
        } catch (QueryException $e) {
            return response()->json(['error' => 'Database error'], 500);
        }
    }
}
