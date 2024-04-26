<?php

namespace App\Http\Controllers\Staff;

use App\Http\Controllers\Controller;
use App\Models\StaffPrograms;
use Illuminate\Http\Request;
use Illuminate\Database\QueryException;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use App\Traits\CrudOperationsTrait;
use App\Traits\HandleFile;

class StaffProgramsController extends Controller
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
            'position' => 'required|string',
            'email' => 'nullable|email',
            'word' => 'required|string',
            'cv' => 'nullable',
            'user_id' => 'required|exists:users,id',
            'department_id' => 'required|exists:departments,id',
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
            $staffPrograms = $this->getAllWithRelation(new StaffPrograms, 'staffSocial',['id', 'name', 'image', 'position', 'word', 'email', 'cv', 'department_id', 'user_id']);

            return response()->json(['data' => $staffPrograms], 200);
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
            $staffPrograms = $this->findWithRelation(new StaffPrograms,'staffSocial', $id);
            return response()->json(['data' => $staffPrograms], 200);
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

            $data = $request->only(['name', 'word', 'position', 'department_id', 'user_id', 'email']);
            $data['image'] = $this->createFile($request, 'image', $request->name, 'image');
            $data['cv'] = $this->createFile($request, 'cv', $request->name . '_CV', 'file');

            $staffProgram = $this->createRecord(new StaffPrograms, $data);

            $insertSocial = $this->insertSocial($request, 'staff_programs_id', $staffProgram->id);

            return response()->json(['data' => $staffProgram, 'message' => 'Staff Program created successfully'], 201);
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
    public function update(Request $request, StaffPrograms $staffProgram)
    {
        try {
            $validationResult = $this->validator($request);
            if ($validationResult !== null) {
                return $validationResult;
            }

            $data = $request->only(['name', 'word', 'position', 'department_id', 'user_id', 'email']);
            $data['image'] = $this->updateFile($request, 'image', $staffProgram->image, $request->name, 'image');
            $data['cv'] = $this->updateFile($request, 'cv', $staffProgram->cv, $request->name . '_CV', 'file');

            $staffProgram = $this->updateRecord(new StaffPrograms, $staffProgram->id, $data);
            $updateSocial = $this->updateSocialLinks($request, $staffProgram->id);

            return response()->json(['data' => $staffProgram, 'message' => 'Staff Program updated successfully'], 200);
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
    public function destroy(StaffPrograms $staffProgram)
    {
        try {
            return $this->deleteRecord($staffProgram, 'image', 'cv');
        } catch (ModelNotFoundException $e) {
            return response()->json(['error' => 'Record not found'], 404);
        } catch (QueryException $e) {
            return response()->json(['error' => 'Database error'], 500);
        }
    }
}
