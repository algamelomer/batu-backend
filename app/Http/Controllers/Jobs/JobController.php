<?php

namespace App\Http\Controllers\Jobs;

use App\Models\Job;
use App\Models\JobApplication;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use App\Traits\CrudOperationsTrait;
use App\Traits\HandleFile;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Database\QueryException;

class JobController extends Controller
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
            'type' => 'required|in:full_time,part_time',
            'email' => 'required|email',
            'phone' => 'required|string',
            'cv' => 'nullable|file',
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
            // Retrieve all jobs with their applications
            $jobs = $this->getAllWithRelation(new Job, 'applications', 'id', 'name', 'description', 'type');
            return response()->json(['jobs' => $jobs], 200);
        } catch (QueryException $e) {
            return response()->json(['error' => 'Database error', 'details' => 'Failed to fetch jobs. Please try again later.'], 500);
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

            $data = $request->only(['name', 'description', 'type']);
            $job = $this->createRecord(new Job, $data);

            $cvPath = null;
            if ($request->hasFile('cv')) {
                $cvPath = $this->createFile($request, 'cv', $request->name, 'file');
            }

            $dataApplication = [
                'jobs_id' => $job->id,
                'email' => $request->input('email'),
                'phone' => $request->input('phone'),
                'cv' => $cvPath,
            ];

            $application = $this->createRecord(new JobApplication, $dataApplication);

            return response()->json(['job' => $job, 'application' => $application, 'message' => 'Data has been created successfully'], 201);
        } catch (QueryException $e) {
            return response()->json(['error' => 'Database error', 'details' => 'Failed to create job. Please try again later.'], 500);
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
            // Retrieve job with its applications
            $job = $this->findWithRelation(new Job, 'applications', $id);

            return response()->json(['job' => $job], 200);
        } catch (ModelNotFoundException $e) {
            return response()->json(['error' => 'Record not found', 'details' => 'The requested job was not found.'], 404);
        } catch (QueryException $e) {
            return response()->json(['error' => 'Database error', 'details' => 'Failed to fetch job details. Please try again later.'], 500);
        }
    }

    /*
    |--------------------------------------------------------------------------
    | Update Function
    |--------------------------------------------------------------------------
    */
    public function update(Request $request, Job $job)
    {
        try {
            $validationResult = $this->validator($request);
            if ($validationResult !== null) {
                return $validationResult;
            }

            $data = $request->only(['name', 'description', 'type']);
            $job = $this->updateRecord(new Job, $job->id, $data);

            if ($request->hasFile('cv')) {
                $cvPath = $this->updateFile($request, 'cv', $job->cv, $request->name, 'file');
                $application = JobApplication::where('jobs_id', $job->id)->first();
                if ($application) {
                    $application->update(['cv' => $cvPath]);
                }
            }
            return response()->json(['job' => $job, 'message' => 'Data has been modified successfully'], 200);
        } catch (QueryException $e) {
            return response()->json(['error' => 'Database error', 'details' => 'Failed to update job. Please try again later.'], 500);
        }
    }

    /*
    |--------------------------------------------------------------------------
    | Destroy Function
    |--------------------------------------------------------------------------
    */
    public function destroy(Job $job)
    {
        try {
            return $this->deleteRecord($job, 'cv');
        } catch (QueryException $e) {
            return response()->json(['error' => 'Database error', 'details' => 'Failed to delete job. Please try again later.'], 500);
        }
    }
}
