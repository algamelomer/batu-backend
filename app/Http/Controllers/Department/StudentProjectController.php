<?php

namespace App\Http\Controllers\Department;

use App\Models\StudentProjects;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Database\QueryException;
use App\Traits\HandleFile;
use App\Traits\CrudOperationsTrait;

class StudentProjectController extends Controller
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
            'description' => 'required|string',
            'image' => 'required',
            'file' => 'nullable',
            'team_name' => 'required|string',
            'user_id' => 'required|exists:users,id',
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
            $projects = $this->getRecord(new StudentProjects, ['id', 'name', 'description', 'image', 'file', 'team_name', 'user_id', 'department_id']);
            return response()->json(['data' => $projects], 200);
        }  catch (ModelNotFoundException $e) {
            return response()->json(['error' => 'Record not found'], 404);
        } catch (QueryException $e) {
            return response()->json(['error' => 'Database error'], 500);
        }
    }

    /*
    |--------------------------------------------------------------------------
    | Display Projects by Department Function
    |--------------------------------------------------------------------------
    */
    public function departmentProject($id)
    {
        try {
            $projects = $this->getRelatedData(new StudentProjects, 'department_id', $id, ['id', 'name', 'description', 'image', 'file', 'team_name', 'user_id', 'department_id']);
            return response()->json(['data' => $projects], 200);
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
            $project = $this->findById(new StudentProjects, $id);
            return response()->json(['data' => $project], 200);
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

            $data = $request->only(['name', 'description', 'team_name', 'user_id', 'department_id']);
            $data['image'] = $this->createFile($request, 'image', $request->name, 'image');
            $data['file'] = $this->createFile($request, 'file', $request->name, 'file');

            $project = $this->createRecord(new StudentProjects, $data);

            return response()->json(['data' => $project, 'message' => 'Student Project created successfully'], 200);
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
    public function update(Request $request, StudentProjects $studentProject)
    {
        try {
            $validationResult = $this->validator($request);
            if ($validationResult !== null) {
                return $validationResult;
            }

            $data = $request->only(['name', 'description', 'team_name', 'user_id', 'department_id']);
            $data['image'] = $this->updateFile($request, 'image', $studentProject->image, $request->name, 'image');
            $data['file'] = $this->updateFile($request, 'file', $studentProject->file, $request->name, 'file');

            $project = $this->updateRecord(new StudentProjects, $studentProject->id, $data);

            return response()->json(['data' => $project, 'message' => 'Student Project updated successfully'], 200);
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
    public function destroy(StudentProjects $studentProject)
    {
        try {
            return $this->deleteRecord($studentProject, 'image', 'file');
        } catch (ModelNotFoundException $e) {
            return response()->json(['error' => 'Record not found'], 404);
        } catch (QueryException $e) {
            return response()->json(['error' => 'Database error'], 500);
        }
    }
}
