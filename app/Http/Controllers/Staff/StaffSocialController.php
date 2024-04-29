<?php

namespace App\Http\Controllers\Staff;

use App\Http\Controllers\Controller;
use App\Models\StaffSocial;
use Illuminate\Http\Request;
use Illuminate\Database\QueryException;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use App\Traits\CrudOperationsTrait;
use App\Traits\HandleFile;

class StaffSocialController extends Controller
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
            'name' => 'required|string|in:Facebook,Instagram,X,LinkedIN,GitHub',
            'link' => 'required|url',
            'user_id' => 'required|exists:users,id',
            'staff_programs_id' => 'nullable|exists:staff_programs,id',
            'staff_members_id' => 'nullable|exists:staff_members,id',
            'faculty_leaders_id' => 'nullable|exists:faculty_leaders,id',
            'university_leaders_id' => 'nullable|exists:university_leaders,id',
            'faculty_agent_staff_id' => 'nullable|exists:faculty_agent_staff,id',
            'leader_council_id' => 'nullable|exists:leader_councils,id',
        ];
        return $this->validateRequestData($request, $rules);
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

            $data = $request->only(['name', 'link', 'user_id', 'staff_programs_id', 'staff_members_id', 'faculty_leaders_id', 'university_leaders_id', 'faculty_agent_staff_id', 'leader_council_id']);
            $data['image'] = $this->imageSocial($request->name, 'image');
            $staffSocial = $this->createRecord(new StaffSocial, $data);

            return response()->json(['data' => $staffSocial, 'message' => 'Staff Social created successfully'], 201);
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
    public function update(Request $request, StaffSocial $staffSocial)
    {
        try {
            $validationResult = $this->validator($request);
            if ($validationResult !== null) {
                return $validationResult;
            }

            $data = $request->only(['name', 'link', 'user_id', 'staff_programs_id', 'staff_members_id', 'faculty_leaders_id', 'university_leaders_id', 'faculty_agent_staff_id', 'leader_council_id']);
            $data['image'] = $this->imageSocial($request->name, 'image');
            $staffSocial->update($data);

            return response()->json(['data' => $staffSocial, 'message' => 'Staff Social updated successfully'], 200);
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
    public function destroy(StaffSocial $staffSocial)
    {
        try {
            return $this->deleteRecord($staffSocial);
        } catch (ModelNotFoundException $e) {
            return response()->json(['error' => 'Record not found'], 404);
        } catch (QueryException $e) {
            return response()->json(['error' => 'Database error'], 500);
        }
    }
}
