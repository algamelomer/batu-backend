<?php

namespace App\Http\Controllers\University;

use App\Models\SocialLinks;
use App\Models\Feedback;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Database\QueryException;
use App\Traits\CrudOperationsTrait;

class ContactController extends Controller
{
    use CrudOperationsTrait;

    private function validator($request)
    {
        $rules = [
            'name' => 'required|string',
            'email' => 'required|email',
            'description' => 'required|string',
            'phone' => 'required|min:11|max:11',
            'category' => 'required|in:proposal,question,complaint',
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
            $socialLinks = $this->getRecord(new SocialLinks, ['id', 'name', 'image', 'link']);
            $reason = ['Complaint', 'Question', 'Proposal'];
            return response()->json(['socialLinks' => $socialLinks, 'reason' => $reason], 200);
        } catch (ModelNotFoundException $e) {
            return response()->json(['error' => 'Record not found'], 404);
        } catch (QueryException $e) {
            return response()->json(['error' => 'Database error'], 500);
        }
    }

    /*
    |--------------------------------------------------------------------------
    | Store Feedback Function
    |--------------------------------------------------------------------------
    */
    public function storeFeedback(Request $request)
    {
        try {
            $validationResult = $this->validator($request);
            if ($validationResult !== null) {
                return $validationResult;
            }

            $data = [
                'name' => $request->name,
                'email' => $request->email,
                'description' => $request->description,
                'phone' => $request->phone,
                'category' => $request->category,
            ];

            $newFeedback = $this->createRecord(new Feedback, $data);

            return response()->json(['data' => $newFeedback, 'message' => 'Feedback created successfully'], 201);
        } catch (ModelNotFoundException $e) {
            return response()->json(['error' => 'Record not found'], 404);
        } catch (QueryException $e) {
            return response()->json(['error' => 'Database error'], 500);
        }
    }
}
