<?php

namespace App\Http\Controllers\Faculty;

use App\Models\AboutUniversity;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Traits\CrudOperationsTrait;
use App\Traits\HandleFile;
use Illuminate\Support\Facades\Validator;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Database\QueryException;

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
            'image' => 'nullable',
            'video' => 'nullable',
            'description' => 'nullable|string',
            'description_video' => 'nullable|string',
            'type' => 'required|in:mission,history,vision,governing_council,contracts,policies,header,UniversityInfo',
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
            $aboutUniversity = $this->getRecord(new AboutUniversity, 'id', 'title', 'image', 'description', 'description_video', 'video', 'type', 'user_id');

            $data = [
                'mission' => [],
                'history' => [],
                'vision' => [],
                'governing_council' => [],
                'contracts' => [],
                'policies' => [],
                'header' => [],
                'UniversityInfo' => [],
            ];

            foreach ($aboutUniversity as $item) {
                $data[$item->type][] = $item;
            }

            return response()->json(['data' => $data], 200);
        } catch (ModelNotFoundException $e) {
            return response()->json(['error' => 'Record not found', 'details' => 'The requested record was not found.'], 404);
        } catch (QueryException $e) {
            return response()->json(['error' => 'Database error', 'details' => 'Failed to fetch record. Please try again later.'], 500);
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
            $aboutUniversity = $this->findById(new AboutUniversity, $id);
            return response()->json(['data' => $aboutUniversity], 200);
        } catch (ModelNotFoundException $e) {
            return response()->json(['error' => 'Record not found', 'details' => 'The requested record was not found.'], 404);
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
            $data = $request->only(['title', 'description', 'type', 'user_id', 'description_video']);
            if ($request->hasFile('image')) {
                $data['image'] = $this->createFile($request, 'image', $request->name, 'image');
            }
            if ($request->hasFile('video')) {
                $data['video'] = $this->createFile($request, 'video', $request->name, 'video');
            }

            $AboutUniversity = $this->createRecord(new AboutUniversity, $data);
            return response()->json(['data' => $AboutUniversity, 'message' => 'Data About University created successfully'], 201);
        } catch (QueryException $e) {
            return response()->json(['error' => 'Database error', 'details' => 'Failed to create record. Please try again later.'], 500);
        }
    }
    /*
    |--------------------------------------------------------------------------
    | Update Function
    |--------------------------------------------------------------------------
    */
    public function update(Request $request, AboutUniversity $aboutUniversity)
    {
        try {
            $validationResult = $this->validator($request);
            if ($validationResult !== null) {
                return $validationResult;
            }
            $data = $request->only(['title', 'description', 'type', 'user_id', 'description_video']);
            if ($request->hasFile('image')) {
                $data['image'] = $this->updateFile($request, 'image', $aboutUniversity->image, $request->name, 'image');
            }
            if ($request->hasFile('video')) {
                $data['video'] = $this->updateFile($request, 'video', $aboutUniversity->video, $request->name, 'video');
            }

            $AboutUniversity = $this->updateRecord(new AboutUniversity, $aboutUniversity->id, $data);
            return response()->json(['data' => $AboutUniversity, 'message' => 'Data About University updated successfully'], 201);
        } catch (ModelNotFoundException $e) {
            return response()->json(['error' => 'Record not found', 'details' => 'The requested record was not found.'], 404);
        } catch (QueryException $e) {
            return response()->json(['error' => 'Database error', 'details' => 'Failed to update record. Please try again later.'], 500);
        }
    }

    /*
    |--------------------------------------------------------------------------
    | Destroy Function
    |--------------------------------------------------------------------------
    */
    public function destroy(AboutUniversity $aboutUniversity)
    {
        try {
            return $this->deleteRecord($aboutUniversity, 'image', 'video');
        } catch (QueryException $e) {
            return response()->json(['error' => 'Database error', 'details' => 'Failed to delete record. Please try again later.'], 500);
        }
    }
}
