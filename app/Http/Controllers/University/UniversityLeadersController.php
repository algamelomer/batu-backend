<?php

namespace App\Http\Controllers\University;

use App\Models\UniversityLeaders;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Database\QueryException;
use App\Traits\CrudOperationsTrait;
use App\Traits\HandleFile;

class UniversityLeadersController extends Controller
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
            'description' => 'required|string',
            'word' => 'required|string',
            'email' => 'nullable|email',
            'cv' => 'nullable',
            'position' => 'required|string|in:President,Vice_President',
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
            $universityLeader = $this->getAllWithRelation(new UniversityLeaders, 'staffSocial', ['id', 'name', 'image', 'position', 'description', 'email', 'cv', 'word', 'user_id']);
            return response()->json(['data' => $universityLeader], 200);
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
            $universityLeader = $this->findWithRelation(new UniversityLeaders, 'staffSocial', $id);
            return response()->json(['data' => $universityLeader], 200);
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

            $data = $request->only(['name', 'description', 'word', 'position', 'cv', 'email', 'user_id']);
            $data['image'] = $this->createFile($request, 'image', $request->name, 'image');
            $data['cv'] = $this->createFile($request, 'cv', $request->name . '_CV', 'file');

            $universityLeader = $this->createRecord(new UniversityLeaders, $data);
            $insertSocial = $this->insertSocial($request, 'university_leaders_id', $universityLeader->id);

            return response()->json(['data' => $universityLeader, 'message' => 'University Leader created successfully'], 201);
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
    public function update(Request $request, UniversityLeaders $universityLeader)
    {
        try {
            $validationResult = $this->validator($request);
            if ($validationResult !== null) {
                return $validationResult;
            }

            $data = $request->only(['name', 'description', 'word', 'position', 'cv', 'email', 'user_id']);
            $data['image'] = $this->updateFile($request, 'image', $universityLeader->image, $request->name, 'image');
            $data['cv'] = $this->updateFile($request, 'cv', $universityLeader->cv, $request->name . '_CV', 'file');

            $universityLeader = $this->updateRecord(new UniversityLeaders, $universityLeader->id, $data);
            $updateSocial = $this->updateSocialLinks($request, $universityLeader->id);

            return response()->json(['data' => $universityLeader, 'message' => 'University Leader updated successfully'], 200);
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
    public function destroy(UniversityLeaders $universityLeader)
    {
        try {
            return $this->deleteRecord($universityLeader, 'image', 'cv');
        } catch (ModelNotFoundException $e) {
            return response()->json(['error' => 'Record not found'], 404);
        } catch (QueryException $e) {
            return response()->json(['error' => 'Database error'], 500);
        }
    }
}
