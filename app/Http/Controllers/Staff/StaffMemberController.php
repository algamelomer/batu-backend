<?php

namespace App\Http\Controllers\Staff;

use App\Models\StaffMembers;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Database\QueryException;
use App\Traits\CrudOperationsTrait;
use App\Traits\HandleFile;

class StaffMemberController extends Controller
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
            'description' => 'nullable|string',
            'cv' => 'nullable',
            'user_id' => 'required|exists:users,id',
            'faculty_id' => 'nullable|exists:faculties,id',
            'department_id' => 'nullable|exists:departments,id',
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
            $staffMembers = $this->getAllWithRelation(new StaffMembers, 'studyPlan',['id', 'name', 'image', 'position', 'description', 'email', 'cv', 'department_id', 'faculty_id', 'user_id']);
            return response()->json(['data' => $staffMembers], 200);
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
            $staffMembers = $this->findWithRelation(new StaffMembers, 'studyPlan', $id);
            return response()->json(['data' => $staffMembers], 200);
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
            $validationResult = $this->validator($request);
            if ($validationResult !== null) {
                return $validationResult;
            }

            $data = $request->only(['name', 'position', 'user_id', 'faculty_id', 'department_id', 'email']);
            $data['image'] = $this->createFile($request, 'image', $request->name, 'image');
            $data['cv'] = $this->createFile($request, 'cv', $request->name . '_CV', 'file');

            $staffMember = $this->createRecord(new StaffMembers, $data);
            $insertSocial = $this->insertSocial($request, 'staff_members_id', $staffMember->id);

            return response()->json(['data' => $staffMember, 'message' => 'Staff Member created successfully'], 201);
        }catch (ModelNotFoundException $e) {
            return response()->json(['error' => 'Record not found'], 404);
        } catch (QueryException $e) {
            return response()->json(['error' => 'Database error'. $e], 500);
        }
    }

    /*
    |--------------------------------------------------------------------------
    | Update Function
    |--------------------------------------------------------------------------
    */
    public function update(Request $request, StaffMembers $staffMember)
    {
        try {
            $validationResult = $this->validator($request);
            if ($validationResult !== null) {
                return $validationResult;
            }

            $data = $request->only(['name', 'position', 'user_id', 'faculty_id', 'department_id', 'email']);
            $data['image'] = $this->updateFile($request, 'image', $staffMember->image, $request->name, 'image');
            $data['cv'] = $this->updateFile($request, 'cv', $staffMember->cv, $request->name . '_CV', 'file');

            $staffMember = $this->updateRecord(new StaffMembers, $staffMember->id, $data);
            $updateSocial = $this->updateSocialLinks($request, $staffMember->id);

            return response()->json(['data' => $staffMember, 'message' => 'Staff Member updated successfully'], 200);
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
    public function destroy(StaffMembers $staffMember)
    {
        try {
            return $this->deleteRecord($staffMember, 'image', 'cv');
        } catch (ModelNotFoundException $e) {
            return response()->json(['error' => 'Record not found'], 404);
        } catch (QueryException $e) {
            return response()->json(['error' => 'Database error'], 500);
        }
    }
}
