<?php

namespace App\Http\Controllers\Applying;

use App\Models\JobApplications;
use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Database\QueryException;
use App\Traits\HandleFile;
use App\Traits\CrudOperationsTrait;
use App\Http\Controllers\Controller;

class JobApplicationsController extends Controller
{
    use CrudOperationsTrait;
    use HandleFile;

    /*
    |--------------------------------------------------------------------------
    | Index Function
    |--------------------------------------------------------------------------
    */
    public function index()
    {
        try {
            $JobApplications = $this->getRecord(new JobApplications(), ['id', 'name', 'description', 'email', 'phone', 'cv', 'position']);
            return response()->json(['data' => $JobApplications], 200);
        }  catch (ModelNotFoundException $e) {
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
            $JobApplications = $this->findById(new JobApplications, $id);
            return response()->json(['data' => $JobApplications], 200);
        }  catch (ModelNotFoundException $e) {
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
    public function destroy(JobApplications $JobApplications)
    {
        try {
            $this->deleteRecord($JobApplications,'photo', 'cv');
            return response()->json(['message' => 'Job Applications deleted successfully'], 200);
        } catch (ModelNotFoundException $e) {
            return response()->json(['error' => 'Record not found'], 404);
        } catch (QueryException $e) {
            return response()->json(['error' => 'Database error'], 500);
        }
    }
}
