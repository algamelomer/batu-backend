<?php

namespace App\Http\Controllers\Faculty;

use App\Models\FacultyAgentStaff;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Database\QueryException;
use App\Traits\CrudOperationsTrait;
use App\Traits\HandleFile;

class FacultyAgentStaffController extends Controller
{
    use CrudOperationsTrait;
    use HandleFile;

    /*
    |--------------------------------------------------------------------------
    | Validate Request Data Function
    |--------------------------------------------------------------------------
    */
    private function validateData($request)
    {
        $rules = [
            'name' => 'required|string',
            'image' => 'required',
            'email' => 'nullable|email',
            'word' => 'required|string',
            'cv' => 'nullable|string',
            'position' => 'required|string',
            'user_id' => 'required|exists:users,id',
            'faculty_id' => 'required|exists:faculties,id',
            'Facebook' => 'nullable|url',
            'Instagram' => 'nullable|url',
            'X' => 'nullable|url',
            'LinkedIN' => 'nullable|url',
            'GitHub' => 'nullable|url',
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
            $facultyAgents = $this->getAllWithRelation(new FacultyAgentStaff, 'staffSocial',['id', 'name', 'image', 'faculty_id']);
            return response()->json(['data' => $facultyAgents], 200);
        }catch (ModelNotFoundException $e) {
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
            $facultyAgent = $this->findWithRelation(new FacultyAgentStaff, 'staffSocial', $id);
            return response()->json(['data' => $facultyAgent], 200);
        }catch (ModelNotFoundException $e) {
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
            $validationResult = $this->validateData($request);
            if ($validationResult !== null) {
                return $validationResult;
            }

            $data = $request->only(['name', 'email', 'word', 'position', 'user_id', 'faculty_id']);
            $data['image'] = $this->createFile($request, 'image', $request->name, 'image');
            $data['cv'] = $this->createFile($request, 'cv', $request->name  . '_CV', 'file');
            $facultyAgent = $this->createRecord(new FacultyAgentStaff, $data);
            $insertSocial = $this->insertSocial($request, 'university_leaders_id', $facultyAgent->id);

            return response()->json(['data' => $facultyAgent, 'message' => 'Faculty Agent Staff created successfully'], 201);
        }catch (ModelNotFoundException $e) {
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
    public function update(Request $request, FacultyAgentStaff $facultyAgentStaff)
    {
        try {
            $validationResult = $this->validateData($request);
            if ($validationResult !== null) {
                return $validationResult;
            }

            $data = $request->only(['name', 'email', 'word', 'position', 'user_id', 'faculty_id']);
            $data['image'] = $this->updateFile($request, 'image', $facultyAgentStaff->image, $request->name, 'image');
            $data['cv'] = $this->updateFile($request, 'cv', $facultyAgentStaff->cv, $request->name  . '_CV', 'file');
            $facultyAgentStaff->update($data);
            $updateSocial = $this->updateSocialLinks($request, $facultyAgentStaff->id);

            return response()->json(['data' => $data, 'message' => 'Faculty Agent Staff updated successfully'], 200);
        }catch (ModelNotFoundException $e) {
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
    public function destroy(FacultyAgentStaff $facultyAgentStaff)
    {
        try {
            return $this->deleteRecord($facultyAgentStaff, 'image', 'cv');
        }catch (ModelNotFoundException $e) {
            return response()->json(['error' => 'Record not found'], 404);
        } catch (QueryException $e) {
            return response()->json(['error' => 'Database error'], 500);
        }
    }
}
