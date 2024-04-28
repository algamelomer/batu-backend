<?php

namespace App\Http\Controllers\Faculty;

use App\Http\Controllers\Controller;
use App\Models\FacultyLeaders;
use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Database\QueryException;
use App\Traits\CrudOperationsTrait;
use App\Traits\HandleFile;

class FacultyLeaderController extends Controller
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
            'email' => 'nullable|email',
            'word' => 'required|string',
            'cv' => 'nullable|string',
            'position' => 'required|string',
            'category' => 'required|in:dean,vice',
            'faculty_id' => 'required|exists:faculties,id',
            'user_id' => 'required|exists:users,id',
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
            $facultyLeaders = $this->getAllWithRelation(new FacultyLeaders, 'staffSocial', ['id', 'name', 'image', 'email', 'word', 'cv', 'position', 'category', 'faculty_id', 'user_id']);
            return response()->json(['data' => $facultyLeaders], 200);
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
            $facultyLeader = $this->findWithRelation(new FacultyLeaders, 'staffSocial', $id);
            return response()->json(['data' => $facultyLeader], 200);
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

            $data = $request->only(['name', 'email', 'word', 'position', 'category', 'faculty_id', 'user_id']);
            $data['image'] = $this->createFile($request, 'image', $request->name, 'image');
            $data['cv'] = $this->createFile($request, 'cv', $request->name. '_CV', 'file');

            $newFacultyLeader = $this->createRecord(new FacultyLeaders, $data);
            $insertSocial = $this->insertSocial($request, 'faculty_leaders_id', $newFacultyLeader->id);

            return response()->json(['data' => $newFacultyLeader, 'message' => 'Faculty leader created successfully'], 201);
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
    public function update(Request $request, FacultyLeaders $facultyLeader)
    {
        try {
            $validationResult = $this->validator($request);
            if ($validationResult !== null) {
                return $validationResult;
            }

            $data = $request->only(['name', 'image', 'email', 'word', 'cv', 'position', 'category', 'faculty_id', 'user_id']);
            $data['image'] = $this->updateFile($request, 'image', $facultyLeader->image, $request->name, 'image');
            $data['cv'] = $this->updateFile($request, 'cv', $facultyLeader->cv, $request->name. '_CV', 'file');

            $updatedFacultyLeader = $this->updateRecord(new FacultyLeaders, $facultyLeader->id, $data);
            $updateSocial = $this->updateSocialLinks($request, $updatedFacultyLeader->id);

            return response()->json(['data' => $updatedFacultyLeader, 'message' => 'Faculty leader updated successfully'], 200);
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
    public function destroy(FacultyLeaders $facultyLeader)
    {
        try {
            return $this->deleteRecord($facultyLeader, 'image', 'cv');
        } catch (ModelNotFoundException $e) {
            return response()->json(['error' => 'Record not found'], 404);
        } catch (QueryException $e) {
            return response()->json(['error' => 'Database error'], 500);
        }
    }
}

