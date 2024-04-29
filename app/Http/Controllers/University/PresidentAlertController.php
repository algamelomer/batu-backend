<?php

namespace App\Http\Controllers\University;

use App\Models\PresidentAlerts;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Database\QueryException;
use App\Traits\CrudOperationsTrait;

class PresidentAlertController extends Controller
{
    use CrudOperationsTrait;

    /*
    |--------------------------------------------------------------------------
    | Index Function
    |--------------------------------------------------------------------------
    */
    public function index()
    {
        try {
            $presidentAlerts = $this->getRecord(new PresidentAlerts, ['id', 'name', 'email', 'description']);
            return response()->json(['data' => $presidentAlerts], 200);
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
                $presidentAlert = $this->findById(new PresidentAlerts, $id);
                return response()->json(['data' => $presidentAlert], 200);
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
            $validationResult = $this->validateRequestData($request, [
                'name' => 'nullable|string',
                'email' => 'nullable|email',
                'description' => 'required|string'
            ]);

            if ($validationResult !== null) {
                return $validationResult;
            }

            $data = [
                'name' => $request->name,
                'email' => $request->email,
                'description' => $request->description
            ];

            $newAlert = $this->createRecord(new PresidentAlerts, $data);

            return response()->json(['data' => $newAlert, 'message' => 'President alert created successfully'], 201);
        }catch (ModelNotFoundException $e) {
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
    public function destroy(PresidentAlerts $presidentAlert)
    {
        try {
            return $this->deleteRecord($presidentAlert);
        } catch (ModelNotFoundException $e) {
            return response()->json(['error' => 'Record not found'], 404);
        } catch (QueryException $e) {
            return response()->json(['error' => 'Database error'], 500);
        }
    }
}
