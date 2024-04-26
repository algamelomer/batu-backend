<?php

namespace App\Http\Controllers\Applying;

use App\Models\Applying;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Database\QueryException;
use App\Traits\CrudOperationsTrait;
use App\Traits\HandleFile;

class ApplyingController extends Controller
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
            'category' => 'required|in:staff,student',
            'user_id' => 'required|exists:users,id',
        ];
        return $this->validateRequestData($request, $rules);
    }

    /*
    |--------------------------------------------------------------------------
    | Index Staff Function
    |--------------------------------------------------------------------------
    */
    public function getStaff()
    {
        try {
            $staff = $this->getRelatedData(new Applying, 'category', 'staff', ['id', 'title', 'description', 'image']);

            return response()->json(['data' => $staff], 200);
        } catch (ModelNotFoundException $e) {
            return response()->json(['error' => 'Record not found'], 404);
        } catch (QueryException $e) {
            return response()->json(['error' => 'Database error'], 500);
        }
    }

    /*
    |--------------------------------------------------------------------------
    | Index Staff Function
    |--------------------------------------------------------------------------
    */
    public function getStudent()
    {
        try {
            $staff = $this->getRelatedData(new Applying, 'category', 'student', ['id', 'title', 'description', 'image']);

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
            $apply = $this->findById(new Applying, $id);

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

            $applying = $this->createRecord(new Applying, $data);

            return response()->json(['data' => $applying, 'message' => 'Applying created successfully'], 201);
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
    public function update(Request $request, Applying $applying)
    {
        try {
            $validationResult = $this->validator($request);
            if ($validationResult !== null) {
                return $validationResult;
            }

            $data = $request->only(['title', 'description', 'category', 'user_id']);
            $data['image'] = $this->updateFile($request, 'image', $applying->image, $request->title, 'image');

            $applying = $this->updateRecord(new Applying, $applying->id, $data);

            return response()->json(['data' => $applying, 'message' => 'Applying updated successfully'], 200);
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
    public function destroy(Applying $applying)
    {
        try {
            return $this->deleteRecord($applying, 'image');
        } catch (ModelNotFoundException $e) {
            return response()->json(['error' => 'Record not found'], 404);
        } catch (QueryException $e) {
            return response()->json(['error' => 'Database error'], 500);
        }
    }
}
