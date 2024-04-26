<?php

namespace App\Http\Controllers\University;

use App\Models\Politics;
use App\Models\LeaderCouncil;
use App\Models\AboutUniversity;
use App\Models\PresidentAlerts;
use App\Models\UniversityLeaders;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Database\QueryException;
use App\Traits\CrudOperationsTrait;
use App\Traits\HandleFile;

class AboutUniversityController extends Controller
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
            'title' => 'required|string',
            'image' => 'required',
            'description' => 'required|string',
            'video' => 'nullable|string',
            'description_video' => 'nullable|email',
            'user_id' => 'required|exists:users,id',
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
            $universityInformation = $this->getRecord(new AboutUniversity, ['id', 'title', 'image', 'video', 'description', 'description_video', 'user_id']);
            $leaderCouncil = $this->getRecord(new LeaderCouncil, ['id', 'name', 'image', 'position', 'user_id']);
            $politics = $this->getRecord(new Politics, ['id', 'title', 'description']);
            $PresidentInformation = $this->getRelatedData(new UniversityLeaders, 'position', 'President', ['id', 'name', 'image',]);

            return response()->json(['university' => $universityInformation, 'leaderCouncil' => $leaderCouncil, 'politics' => $politics, 'president' => $PresidentInformation], 200);
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
            $universityInformation = $this->findById(new AboutUniversity, $id);
            return response()->json(['data' => $universityInformation], 200);
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

            $data = $request->only(['title', 'description_video', 'description', 'user_id']);
            $data['image'] = $this->createFile($request, 'image', $request->name, 'image');
            $data['video'] = $this->createFile($request, 'video', $request->name, 'video');

            $newUniversityData = $this->createRecord(new AboutUniversity, $data);

            return response()->json(['data' => $newUniversityData, 'message' => 'University data created successfully'], 201);
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
    public function update(Request $request, AboutUniversity $university)
    {
        try {
            $validationResult = $this->validator($request);
            if ($validationResult !== null) {
                return $validationResult;
            }

            $data = $request->only(['title', 'description_video', 'description', 'user_id']);
            $data['image'] = $this->updateFile($request, 'image', $university->image, $request->name, 'image');
            $data['video'] = $this->createFile($request, 'video', $university->video, $request->name, 'video');
            $updatedUniversityData = $this->updateRecord(new AboutUniversity, $university->id, $data);

            return response()->json(['data' => $updatedUniversityData, 'message' => 'University data updated successfully'], 200);
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
    public function destroy(AboutUniversity $university)
    {
        try {
            return $this->deleteRecord($university, 'image', 'video');
        } catch (ModelNotFoundException $e) {
            return response()->json(['error' => 'Record not found'], 404);
        } catch (QueryException $e) {
            return response()->json(['error' => 'Database error'], 500);
        }
    }
}
