<?php

namespace App\Http\Controllers\Faculty;

use App\Models\FacultyMember;
use App\Models\Event;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\http\Resources\staffResource;
use Illuminate\Support\Facades\Validator;
use App\Traits\CrudOperationsTrait;
use App\Traits\HandleFile;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Database\QueryException;

class FacultyMemberController extends Controller
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
            'department_id' => 'nullable|exists:departments,id',
            'user_id' => 'required|exists:users,id',
            'faculty_id' => 'nullable|exists:faculties,id',
            'name' => 'required|string',
            'image' => 'required',
            'title' => 'required|string',
            'sub_title' => 'nullable|string',
            'head_description' => 'nullable|string',
            'career' => 'nullable|string',
            'scientific_interests' => 'nullable|string',
            'experience' => 'nullable|string',
            'word' => 'nullable|string',
            'certificates_title' => 'nullable|string',
            'certificates_description' => 'nullable|string',
            'cv' => 'nullable',
            'email' => 'nullable|email',
            'Researches_title' => 'nullable|string',
            'Researches_description' => 'nullable|string',
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
            $facultyMembers = $this->getRecord(new FacultyMember, 'id', 'department_id', 'faculty_id', 'user_id', 'name', 'image', 'title', 'sub_title', 'head_description', 'career', 'experience', 'scientific_interests', 'word', 'email', 'certificates_title', 'certificates_description', 'cv', 'Researches_title', 'Researches_description');

            $formattedData = $facultyMembers->map(function ($facultyMember) {

                $data = $facultyMember->toArray();
                $data['events'] = $facultyMember->events->toArray();
                $data['courses'] = $facultyMember->studyPlans->pluck('name')->toArray();

                return $data;
            });

            return response()->json(['data' => $formattedData], 200);
        } catch (QueryException $e) {
            return response()->json(['error' => 'Database error', 'details' => 'Failed to fetch faculty members. Please try again later.'], 500);
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

            $data = $request->only(['department_id', 'faculty_id', 'user_id', 'name', 'title', 'sub_title', 'head_description', 'career', 'experience', 'scientific_interests', 'word', 'email', 'certificates_title', 'certificates_description', 'Researches_title', 'Researches_description', 'cv']);
            $data['image'] = $this->createFile($request, 'image', $request->name, 'image');
            $data['cv'] = $this->createFile($request, 'cv', $request->name, 'cv');

            $facultyMember = $this->createRecord(new FacultyMember, $data);

            return response()->json(['data' => $facultyMember, 'message' => 'Faculty member created successfully'], 201);
        } catch (QueryException $e) {
            return response()->json(['error' => 'Database error', 'details' => 'Failed to create faculty member. Please try again later.'], 500);
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
            $facultyMember = $this->findById(new FacultyMember, $id);
            $data = [
                'faculty_member' => $facultyMember->toArray(),
                'events' => $facultyMember->events->toArray(),
                'courses' => $facultyMember->studyPlans->pluck('name')->toArray(),
            ];

            return response()->json(['data' => $data], 200);
        } catch (ModelNotFoundException $e) {
            return response()->json(['error' => 'Record not found', 'details' => 'The requested faculty member was not found.'], 404);
        } catch (QueryException $e) {
            return response()->json(['error' => 'Database error', 'details' => 'Failed to fetch faculty member details. Please try again later.'], 500);
        }
    }

    /*
    |--------------------------------------------------------------------------
    | Update Function
    |--------------------------------------------------------------------------
    */
    public function update(Request $request, FacultyMember $facultyMember)
    {
        try {
            $validationResult = $this->validator($request);
            if ($validationResult !== null) {
                return $validationResult;
            }

            $data = $request->only(['department_id', 'faculty_id', 'user_id', 'name', 'title', 'sub_title', 'head_description', 'career', 'experience', 'scientific_interests', 'word', 'email', 'certificates_title', 'certificates_description', 'cv', 'Researches_title', 'Researches_description']);
            if ($request->hasFile('image')) {
                $data['image'] = $this->updateFile($request, 'image', $facultyMember->image, $request->name, 'image');
            }
            if ($request->hasFile('cv')) {
                $data['cv'] = $this->updateFile($request, 'cv', $facultyMember->cv, $request->name, 'cv');
            }

            $facultyMember = $this->updateRecord(new FacultyMember, $facultyMember->id, $data);

            return response()->json(['data' => $facultyMember, 'message' => 'Faculty member updated successfully'], 200);
        } catch (ModelNotFoundException $e) {
            return response()->json(['error' => 'Record not found', 'details' => 'The requested faculty member was not found.'], 404);
        } catch (QueryException $e) {
            return response()->json(['error' => 'Database error', 'details' => 'Failed to update faculty member. Please try again later.'], 500);
        }
    }

    /*
    |--------------------------------------------------------------------------
    | Destroy Function
    |--------------------------------------------------------------------------
    */
    public function destroy(FacultyMember $facultyMember)
    {
        try {
            return $this->deleteRecord($facultyMember, 'image');
        } catch (QueryException $e) {
            return response()->json(['error' => 'Database error', 'details' => 'Failed to delete faculty member. Please try again later.'], 500);
        }
    }

    /*
    |--------------------------------------------------------------------------
    | Show Events Associated with Faculty Member
    |--------------------------------------------------------------------------
    */
    public function showEvents($facultyMemberId)
    {
        try {
            $facultyMember = FacultyMember::findOrFail($facultyMemberId);

            $events = $facultyMember->events()->get();

            $transformedEvents = $events->map(function ($event) {
                $images = $event->media->where('type', 'image')->pluck('file')->toArray();
                $videos = $event->media->where('type', 'video')->pluck('file')->toArray();
                $unknown = $event->media->where('type', null)->pluck('file')->toArray();
                return [
                    'id' => $event->id,
                    'title' => $event->title,
                    'description' => $event->description,
                    'date' => $event->date,
                    'images' => $images,
                    'videos' => $videos,
                    'unknown' => $unknown,
                ];
            });

            return $transformedEvents;
        } catch (ModelNotFoundException $e) {
        } catch (QueryException $e) {
        }
    }

    /*
    |--------------------------------------------------------------------------
    | Show Events Associated with Faculty Member
    |--------------------------------------------------------------------------
    */
    public function getAssociatedCourses($facultyMemberId)
    {
        try {
            $facultyMember = FacultyMember::findOrFail($facultyMemberId);

            $studyPlans = $facultyMember->studyPlans()->get('name');

            return response()->json(['courses' => $studyPlans], 200);
        } catch (ModelNotFoundException $e) {
            return response()->json(['error' => 'Record not found', 'details' => 'The requested faculty member was not found.'], 404);
        } catch (QueryException $e) {
            return response()->json(['error' => 'Database error', 'details' => 'Failed to fetch associated study plans. Please try again later.'], 500);
        }
    }

    /*
    |--------------------------------------------------------------------------
    | search Function in the Faculty Member
    |--------------------------------------------------------------------------
    */
    public function search(Request $request)
    {
        try {
            $query = FacultyMember::query();
            if ($request->has('faculty_id')) {
                $query->where('faculty_id', $request->faculty_id);
            }
            if ($request->has('department_id')) {
                $query->where('department_id', $request->department_id);
            }
            if ($request->has('name')) {
                $query->where('name', 'like', '%' . $request->name . '%');
            }
            $facultyMembers = staffResource::collection($query->get());

            if ($query->count() > 0) {
                return response()->json(['data' => $facultyMembers], 200);
            } else {
                return response()->json(['error' => 'not found', 'details' => 'The requested faculty member to search for faculty members was not found. Please try again later.'], 404);
            }
        } catch (QueryException $e) {
            return response()->json(['error' => 'Database error', 'details' => 'Failed to search for faculty members. Please try again later.'], 500);
        }
    }
}
