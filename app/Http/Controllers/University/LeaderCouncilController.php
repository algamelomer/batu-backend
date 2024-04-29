<?php

namespace App\Http\Controllers\University;

use App\Models\LeaderCouncil;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Database\QueryException;
use App\Traits\CrudOperationsTrait;
use App\Traits\HandleFile;

class LeaderCouncilController extends Controller
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
            'description' => 'nullable|string',
            'image' => 'required',
            'position' => 'required|string',
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
            $feedbacks = $this->getAllWithRelation(new LeaderCouncil, 'staffSocial',['id', 'name', 'image', 'position', 'description']);
            return response()->json(['data' => $feedbacks], 200);
        } catch (ModelNotFoundException $e) {
            return response()->json(['error' => 'Record not found'], 404);
        } catch (QueryException $e) {
            return response()->json(['error' => 'Database error'. $e], 500);
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
            $feedback = $this->findWithRelation(new LeaderCouncil, 'staffSocial', $id);
            return response()->json(['data' => $feedback], 200);
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

            $data = $request->only(['name', 'position', 'description', 'user_id']);
            $data['image'] = $this->createFile($request, 'image', $request->name, 'image');

            $leaderCouncil = $this->createRecord(new LeaderCouncil, $data);
            $insertSocial = $this->insertSocial($request, 'leader_council_id', $leaderCouncil->id);


            return response()->json(['data' => $leaderCouncil, 'message' => 'Leader Council member created successfully'], 201);
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
    public function update(Request $request, LeaderCouncil $leaderCouncil)
    {
        try {
            $validationResult = $this->validator($request);
            if ($validationResult !== null) {
                return $validationResult;
            }

            $data = $request->only(['name', 'position', 'user_id']);
            $data['image'] = $this->updateFile($request, 'image', $leaderCouncil->image, $request->name, 'image');

            $leaderCouncil = $this->updateRecord(new LeaderCouncil, $leaderCouncil->id, $data);
            $updateSocial = $this->updateSocialLinks($request, $leaderCouncil->id);

            return response()->json(['data' => $leaderCouncil, 'message' => 'Leader Council member updated successfully'], 200);
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
    public function destroy(LeaderCouncil $leaderCouncil)
    {
        try {
            return $this->deleteRecord($leaderCouncil, 'image');
        } catch (ModelNotFoundException $e) {
            return response()->json(['error' => 'Record not found'], 404);
        } catch (QueryException $e) {
            return response()->json(['error' => 'Database error'], 500);
        }
    }
}
