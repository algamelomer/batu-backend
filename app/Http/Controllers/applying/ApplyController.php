<?php

namespace App\Http\Controllers\Applying;

use App\Models\Applying;
use App\Models\ApplyStaff;
use App\Models\ApplyStudies;
use App\Models\JobApplications;
use App\Models\Faculty;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Traits\CrudOperationsTrait;
use App\Traits\HandleFile;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Database\QueryException;


class ApplyController extends Controller
{
    use CrudOperationsTrait;
    use HandleFile;

    /*
    |--------------------------------------------------------------------------
    | display Apply Staff Function
    |--------------------------------------------------------------------------
    */
    public function displayApplyStaff()
    {
        try {
            $applyAdministrative = $this->getRelatedData(new ApplyStaff, 'category', 'administrative', ['id', 'title', 'image', 'description']);
            $applyTeachingStaff = $this->getRelatedData(new ApplyStaff, 'category', 'teaching_staff', ['id', 'title', 'image', 'description']);
            $applyOther = $this->getRelatedData(new ApplyStaff, 'category', 'other', ['id', 'title', 'image', 'description']);
            $applyPageStaff = $this->getRelatedData(new Applying, 'category', 'staff', ['id', 'title', 'image', 'description']);

            return response()->json(['administrative' => $applyAdministrative, 'teachingStaff' => $applyTeachingStaff, 'other' => $applyOther, 'data' => $applyPageStaff], 200);
        } catch (ModelNotFoundException $e) {
            return response()->json(['error' => 'Record not found'], 404);
        } catch (QueryException $e) {
            return response()->json(['error' => 'Database error'], 500);
        }
    }

    /*
    |--------------------------------------------------------------------------
    | Get Available Faculties Function
    |--------------------------------------------------------------------------
    */
    public function getAvailableFaculties()
    {
        try {
            $faculties = Faculty::select('id', 'name')->get();

            $applyPageStudies = $this->getRelatedData(new Applying, 'category', 'student', ['id', 'title', 'image', 'description']);

            return response()->json([
                'data' => $applyPageStudies,
                'faculties' => $faculties
            ], 200);
        } catch (ModelNotFoundException $e) {
            return response()->json(['error' => 'Record not found'], 404);
        } catch (QueryException $e) {
            return response()->json(['error' => 'Database error'], 500);
        }
    }

    /*
    |--------------------------------------------------------------------------
    | Show Apply Student Function
    |--------------------------------------------------------------------------
    */
    public function displayApplyStudent(Request $request)
    {
        try {
            if (!$request->has('faculty_id')) {
                return response()->json(['error' => 'Faculty ID is required'], 400);
            }
            $facultyId = $request->faculty_id;
            $applyHighSchool = $this->getRelatedData(new ApplyStudies, 'faculty_id', $facultyId, ['id', 'title', 'image', 'description'], 'hight_school');
            $applyIndustrial = $this->getRelatedData(new ApplyStudies, 'faculty_id', $facultyId, ['id', 'title', 'image', 'description'], 'industrial');
            $applyIndustrialInstitute = $this->getRelatedData(new ApplyStudies, 'faculty_id', $facultyId, ['id', 'title', 'image', 'description'], 'industrial_institute');

            return response()->json([
                'highSchool' => $applyHighSchool,
                'industrial' => $applyIndustrial,
                'industrialInstitute' => $applyIndustrialInstitute
            ], 200);
        } catch (ModelNotFoundException $e) {
            return response()->json(['error' => 'Record not found'], 404);
        } catch (QueryException $e) {
            return response()->json(['error' => 'Database error'], 500);
        }
    }

    /*
    |--------------------------------------------------------------------------
    | Store Job Applications Function
    |--------------------------------------------------------------------------
    */

    public function createApplication(Request $request)
    {
        try {
            $validator = Validator::make($request->all(), [
                'name' => 'required|string',
                'description' => 'required|string',
                'email' => 'required|email',
                'phone' => 'required',
                'position' => 'required',
                'cv' => 'nullable',
            ]);

            if ($validator->fails()) {
                return response()->json(['error' => $validator->errors()], 400);
            }

            $data = $request->only(['name', 'description', 'email','position']);
            $data['cv'] = $this->createFile($request, 'cv', $request->title, 'file');
            $data['phone'] = $this->createFile($request, 'phone', $request->title, 'image');

            $jobApplication = $this->createRecord(new JobApplications, $data);

            return response()->json(['data' => $jobApplication, 'message' => 'Job Applications created successfully'], 201);
        } catch (ModelNotFoundException $e) {
            return response()->json(['error' => 'Record not found'], 404);
        } catch (QueryException $e) {
            return response()->json(['error' => 'Database error'], 500);
        }
    }
}
