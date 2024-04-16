<?php

namespace App\Http\Controllers\Faculty;

use App\Models\SupervisoryTeam;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use App\Traits\CrudOperationsTrait;
use App\Traits\HandleFile;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Database\QueryException;

class SupervisoryTeamController extends Controller
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
            'image' => 'nullable',
            'description' => 'nullable|string',
            'position' => 'required|in:head,vice,university_president,vice_president',
            'department_id' => 'nullable|exists:departments,id',
            'user_id' => 'required|exists:users,id',
            'faculty_id' => 'nullable|exists:faculties,id',
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
            $supervisoryTeams = $this->getRecord(new SupervisoryTeam, 'id', 'department_id', 'faculty_id', 'user_id', 'name', 'image', 'description', 'position');
            return response()->json(['data' => $supervisoryTeams], 200);
        } catch (QueryException $e) {
            return response()->json(['error' => 'Database error', 'details' => 'Failed to fetch supervisory teams. Please try again later.'], 500);
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

            $data = $request->only(['department_id', 'faculty_id', 'user_id', 'name', 'description', 'position']);
            if ($request->hasFile('image')) {
                $data['image'] = $this->createFile($request, 'image', $request->name, 'image');
            }
            $supervisoryTeam = $this->createRecord(new SupervisoryTeam, $data);

            return response()->json(['data' => $supervisoryTeam, 'message' => 'Supervisory Team created successfully'], 201);
        } catch (QueryException $e) {
            return response()->json(['error' => 'Database error', 'details' => 'Failed to create supervisory team. Please try again later.'], 500);
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
            $supervisoryTeam = $this->findById(new SupervisoryTeam, $id);
            return response()->json(['data' => $supervisoryTeam], 200);
        } catch (ModelNotFoundException $e) {
            return response()->json(['error' => 'Record not found', 'details' => 'The requested supervisory team was not found.'], 404);
        } catch (QueryException $e) {
            return response()->json(['error' => 'Database error', 'details' => 'Failed to fetch supervisory team details. Please try again later.'], 500);
        }
    }

    /*
    |--------------------------------------------------------------------------
    | Update Function
    |--------------------------------------------------------------------------
    */
    public function update(Request $request, SupervisoryTeam $supervisoryTeam)
    {
        try {
            $validationResult = $this->validator($request);
            if ($validationResult !== null) {
                return $validationResult;
            }

            $data = $request->only(['department_id', 'faculty_id', 'user_id', 'name', 'description', 'position']);
            if ($request->hasFile('image')) {
                $data['image'] = $this->updateFile($request, 'image', $supervisoryTeam->image, $request->name, 'image');
            }

            $supervisoryTeam = $this->updateRecord(new SupervisoryTeam, $supervisoryTeam->id, $data);

            return response()->json(['data' => $supervisoryTeam, 'message' => 'Supervisory Team updated successfully'], 200);
        } catch (ModelNotFoundException $e) {
            return response()->json(['error' => 'Record not found', 'details' => 'The requested supervisory team was not found.'], 404);
        } catch (QueryException $e) {
            return response()->json(['error' => 'Database error', 'details' => 'Failed to update supervisory team. Please try again later.'], 500);
        }
    }

    /*
    |--------------------------------------------------------------------------
    | Destroy Function
    |--------------------------------------------------------------------------
    */
    public function destroy(SupervisoryTeam $supervisoryTeam)
    {
        try {
            return $this->deleteRecord($supervisoryTeam, 'image');
        } catch (QueryException $e) {
            return response()->json(['error' => 'Database error', 'details' => 'Failed to delete supervisory team. Please try again later.'], 500);
        }
    }
}
