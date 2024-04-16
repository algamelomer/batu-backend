<?php

namespace App\Http\Controllers\Faculty;

use App\Models\StudyPlan;
use App\Models\FacultyMember;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use App\Traits\CrudOperationsTrait;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Database\QueryException;

class StudyPlanController extends Controller
{
    use CrudOperationsTrait;
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
            'academic_year' => 'required|string',
            'semester' => 'required|string',
            'credits' => 'nullable|string',
            'lecturer_id' => 'nullable|id',
            'user_id' => 'required|exists:users,id',
            'department_id' => 'required|exists:departments,id',
        ];
        return $this->validateRequestData($request, $rules);
    }


    /*
    |--------------------------------------------------------------------------
    | Get Moderators Function
    |--------------------------------------------------------------------------
    */
    public function getLectures()
    {
        $lectures = FacultyMember::select('id', 'name')->get();
        return response()->json(['lectures' => $lectures], 200);
    }

    /*
    |--------------------------------------------------------------------------
    | Index Function
    |--------------------------------------------------------------------------
    */
    public function index()
    {
        try {
            $studyPlans = $this->getRecord(new StudyPlan, 'id', 'name', 'description', 'lecturer', 'academic_year', 'semester', 'credits', 'user_id', 'department_id');
            return response()->json(['data' => $studyPlans], 200);
        } catch (QueryException $e) {
            return response()->json(['error' => 'Database error', 'details' => 'Failed to fetch study plans. Please try again later.'], 500);
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

            $data = $request->only(['name', 'description', 'lecturer_id', 'academic_year', 'semester', 'credits', 'user_id', 'department_id']);
            $studyPlan = $this->createRecord(new StudyPlan, $data);

            return response()->json(['data' => $studyPlan, 'message' => 'Study plan created successfully'], 201);
        } catch (QueryException $e) {
            return response()->json(['error' => 'Database error', 'details' => 'Failed to create study plan. Please try again later.'], 500);
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
            return response()->json(['error' => 'Record not found', 'details' => 'The requested study plan was not found.'], 404);
        } catch (QueryException $e) {
            return response()->json(['error' => 'Database error', 'details' => 'Failed to fetch study plan details. Please try again later.'], 500);
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

            $data = $request->only(['name', 'description', 'lecturer_id', 'academic_year', 'semester', 'credits', 'user_id', 'department_id']);
            $studyPlan = $this->updateRecord(new StudyPlan, $studyPlan->id, $data);

            return response()->json(['data' => $studyPlan, 'message' => 'Study plan updated successfully'], 200);
        } catch (ModelNotFoundException $e) {
            return response()->json(['error' => 'Record not found', 'details' => 'The requested study plan was not found.'], 404);
        } catch (QueryException $e) {
            return response()->json(['error' => 'Database error', 'details' => 'Failed to update study plan. Please try again later.'], 500);
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
            return $this->deleteRecord($studyPlan);
        } catch (QueryException $e) {
            return response()->json(['error' => 'Database error', 'details' => 'Failed to delete study plan. Please try again later.'], 500);
        }
    }
}
