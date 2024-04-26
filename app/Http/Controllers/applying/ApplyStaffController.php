<?php

namespace App\Http\Controllers\Applying;

use App\Models\ApplyStaff;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Database\QueryException;
use App\Traits\CrudOperationsTrait;
use App\Traits\HandleFile;

class ApplyStaffController extends Controller
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
            'description' => 'required|string',
            'image' => 'required',
            'category' => 'required|in:administrative,teaching_staff,other',
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
            $staff = $this->getRecord(new ApplyStaff, ['id', 'title', 'description', 'image', 'category']);

            return response()->json(['data' => $staff], 200);
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
            $apply = $this->findById(new ApplyStaff, $id);

            return response()->json(['data' => $apply], 200);
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

            $data = $request->only(['title', 'description', 'category', 'user_id']);
            $data['image'] = $this->createFile($request, 'image', $request->title, 'image');

            $applyStaff = $this->createRecord(new ApplyStaff, $data);

            return response()->json(['data' => $applyStaff, 'message' => 'ApplyStaff created successfully'], 201);
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
    public function update(Request $request, ApplyStaff $applyStaff)
    {
        try {
            $validationResult = $this->validator($request);
            if ($validationResult !== null) {
                return $validationResult;
            }

            $data = $request->only(['title', 'description', 'category', 'user_id']);
            $data['image'] = $this->updateFile($request, 'image', $applyStaff->image, $request->title, 'image');

            $applyStaff = $this->updateRecord(new ApplyStaff, $applyStaff->id, $data);

            return response()->json(['data' => $applyStaff, 'message' => 'ApplyStaff updated successfully'], 200);
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
    public function destroy(ApplyStaff $applyStaff)
    {
        try {
            return $this->deleteRecord($applyStaff, 'image');
        } catch (ModelNotFoundException $e) {
            return response()->json(['error' => 'Record not found'], 404);
        } catch (QueryException $e) {
            return response()->json(['error' => 'Database error'], 500);
        }
    }
}
