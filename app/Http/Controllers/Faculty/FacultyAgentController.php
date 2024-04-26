<?php

namespace App\Http\Controllers\Faculty;

use App\Models\FacultyAgent;
use App\Models\FacultyAgentStaff;
use App\Models\StaffSocial;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Database\QueryException;
use App\Traits\CrudOperationsTrait;
use App\Traits\HandleFile;

class FacultyAgentController extends Controller
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
            'category' => 'required|in:services,approach,header',
            'image' => 'nullable',
            'user_id' => 'required|exists:users,id',
        ];
        return $this->validateRequestData($request, $rules);
    }

    /*
    |--------------------------------------------------------------------------
    | display Faculty Agents  Function
    |--------------------------------------------------------------------------
    */
    public function displayFacultyAgent()
    {
        try {
            $staff = $this->getAllWithRelation(new FacultyAgentStaff, 'staffSocial', ['id', 'name', 'image', 'position', 'word', 'email', 'faculty_id', 'user_id']);
            $headerData = $this->getRelatedData(new FacultyAgent, 'category', 'header', ['id', 'title', 'image', 'description']);
            $approach = $this->getRelatedData(new FacultyAgent, 'category', 'approach', ['id', 'title', 'image', 'description']);
            $services = $this->getRelatedData(new FacultyAgent, 'category', 'services', ['id', 'title', 'image', 'description']);
            return response()->json(['approach' => $approach, 'staff'=> $staff, 'services' => $services, 'header' => $headerData], 200);
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
            $facultyAgent = $this->findById(new FacultyAgent, $id);
            return response()->json(['data' => $facultyAgent], 200);
        }catch (ModelNotFoundException $e) {
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
            $facultyAgent = $this->createRecord(new FacultyAgent, $data);

            return response()->json(['data' => $facultyAgent, 'message' => 'Faculty Agent created successfully'], 201);
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
    public function update(Request $request, FacultyAgent $facultyAgent)
    {
        try {
            $validationResult = $this->validator($request);
            if ($validationResult !== null) {
                return $validationResult;
            }

            $data = $request->only(['title', 'description', 'category', 'user_id']);
            $data['image'] = $this->updateFile($request, 'image', $facultyAgent->image, $request->title, 'image');
            $facultyAgent->update($data);

            return response()->json(['data' => $facultyAgent, 'message' => 'Faculty Agent updated successfully'], 200);
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
    public function destroy(FacultyAgent $facultyAgent)
    {
        try {
            return $this->deleteRecord($facultyAgent, 'image');
        } catch (ModelNotFoundException $e) {
            return response()->json(['error' => 'Record not found'], 404);
        } catch (QueryException $e) {
            return response()->json(['error' => 'Database error'], 500);
        }
    }
}
