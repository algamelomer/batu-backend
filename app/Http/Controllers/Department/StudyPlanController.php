<?php

namespace App\Http\Controllers\Department;

use App\Models\StudyPlan;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Database\QueryException;
use App\Traits\HandleFile;
use App\Traits\CrudOperationsTrait;

class StudyPlanController extends Controller
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
            'academic_year' => 'required|string',
            'semester' => 'required|string',
            'credits' => 'nullable|string',
            'user_id' => 'required|exists:users,id',
            'department_id' => 'required|exists:departments,id',
            'staff_programs_id' => 'nullable|exists:staff_programs,id',
            'staff_members_id' => 'nullable|exists:staff_members,id',
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
            $studyPlans = $this->getRecord(new StudyPlan, ['id', 'name', 'description', 'academic_year', 'semester', 'credits', 'user_id', 'department_id', 'staff_programs_id', 'staff_members_id']);
            return response()->json(['data' => $studyPlans], 200);
        } catch (\Exception $e) {
            return response()->json(['error' => 'Failed to fetch Study Plans', 'details' => $e->getMessage()], 500);
        }
    }

    /*
    |--------------------------------------------------------------------------
    | Display Study Plans by Department Function
    |--------------------------------------------------------------------------
    */
    public function departmentStudyPlan($id)
    {
        try {
            $studyPlans = $this->getRelatedData(new StudyPlan, 'department_id', $id, ['id', 'name', 'description', 'academic_year', 'semester', 'credits', 'user_id', 'department_id', 'staff_programs_id', 'staff_members_id']);
            return response()->json(['data' => $studyPlans], 200);
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
            $studyPlan = $this->findById(new StudyPlan, $id);
            return response()->json(['data' => $studyPlan], 200);
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
    public function update(Request $request, StudyPlan $studyPlan)
    {
        try {
            $validationResult = $this->validator($request);
            if ($validationResult !== null) {
                return $validationResult;
            }

            $data = $request->only(['name', 'description', 'academic_year', 'semester', 'credits', 'user_id', 'department_id', 'staff_programs_id', 'staff_members_id']);

            $updatedStudyPlan = $this->updateRecord(new StudyPlan, $studyPlan->id, $data);

            return response()->json(['data' => $updatedStudyPlan, 'message' => 'Study Plan updated successfully'], 200);
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
    public function destroy(StudyPlan $studyPlan)
    {
        try {
            $this->deleteRecord($studyPlan);
            return response()->json(['message' => 'Study Plan deleted successfully'], 200);
        } catch (ModelNotFoundException $e) {
            return response()->json(['error' => 'Record not found'], 404);
        } catch (QueryException $e) {
            return response()->json(['error' => 'Database error'], 500);
        }
    }
}
