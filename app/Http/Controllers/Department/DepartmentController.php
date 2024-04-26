<?php

namespace App\Http\Controllers\Department;

use App\Models\JobOpportunities;
use App\Models\Department;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Database\QueryException;
use App\Traits\HandleFile;
use App\Traits\CrudOperationsTrait;

class DepartmentController extends Controller
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
            'description' => 'required|string',
            'logo' => 'required',
            'image' => 'required',
            'video' => 'nullable',
            'description_video' => 'nullable|string',
            'vision' => 'nullable|string',
            'mission' => 'nullable|string',
            'user_id' => 'required|exists:users,id',
            'faculty_id' => 'required|exists:faculties,id',
            'job_opportunities' => 'nullable|array',
            'job_opportunities.*.title' => 'required|string',
            'job_opportunities.*.link' => 'nullable|url',
        ];

        return $this->validateRequestData($request, $rules);
    }


    /*
    |--------------------------------------------------------------------------
    | Get Department Function
    |--------------------------------------------------------------------------
    */
    public function getDepartment()
    {
        try {
            $departments = $this->getRecord(new Department, ['id', 'name', 'logo', 'description', 'faculty_id']);
            return response()->json(['data' => $departments], 200);
        }catch (ModelNotFoundException $e) {
            return response()->json(['error' => 'Record not found'], 404);
        } catch (QueryException $e) {
            return response()->json(['error' => 'Database error'], 500);
        }
    }

    /*
    |--------------------------------------------------------------------------
    | Display Department Function
    |--------------------------------------------------------------------------
    */
    public function displayDepartment($id)
    {
        try {
            $department = $this->findWithRelation(new Department, ['jobOpportunities', 'studentProjects', 'staffMembers', 'staffPrograms', 'studyPlan'], $id);

            // Handle department record
            $departmentData = $this->HandleRecord($department, ['id', 'name', 'image', 'logo', 'video', 'discription_video', 'vision', 'mission', 'user_id', 'faculty_id']);

            // Handle jobOpportunities record
            $jobOpportunities = $this->HandleRecord($department->jobOpportunities, ['id', 'title', 'link']);

            // Handle studyPlan records
            $studyPlan = $this->HandleRecord($department->studyPlan, ['id', 'name', 'acadenic_year', 'semester', 'description', 'credits', 'user_id', 'staff_programs_id', 'staff_members_id']);

            // Handle studentProjects records
            $studentProjects = $this->HandleRecord($department->studentProjects, ['id', 'name', 'image', 'file', 'description', 'team_name', 'user_id']);

            // Handle staffMembers records
            $staffMembers = $this->HandleRecord($department->staffMembers, ['id', 'name', 'image', 'email', 'description', 'cv', 'position', 'user_id']);

            // Handle StaffPrograms records
            $StaffPrograms = $this->HandleRecord($department->StaffPrograms, ['id', 'name', 'description', 'image', 'file', 'team_name', 'user_id']);

            // Merge staff members and staff programs
            $member = array_merge($StaffPrograms, $staffMembers);

            return response()->json(['department' => $departmentData, 'job_opportunities' => $jobOpportunities, 'StaffPrograms' => $StaffPrograms, 'staffMember' => $member, 'projects' => $studentProjects, 'courses' => $studyPlan], 200);
        }catch (ModelNotFoundException $e) {
            return response()->json(['error' => 'Record not found'], 404);
        } catch (QueryException $e) {
            return response()->json(['error' => 'Database error'], 500);
        }
    }


    /*
    |--------------------------------------------------------------------------
    | Display Department Function
    |--------------------------------------------------------------------------
    */
    public function show($id)
    {
        try {
            $department = $this->findWithRelation(new Department, 'jobOpportunities', $id);
            return response()->json(['department' => $department], 200);
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

            $departmentData = $request->only(['name', 'description', 'description_video', 'vision', 'mission', 'user_id', 'faculty_id']);
            $departmentData['logo'] = $this->createFile($request, 'logo', $request->name, 'image');
            $departmentData['image'] = $this->createFile($request, 'image', $request->name, 'image');
            $departmentData['video'] = $this->createFile($request, 'video', $request->name, 'video');
            $department = $this->createRecord(new Department, $departmentData);

            $jobOpportunitiesData = $request->input('job_opportunities');
            if ($jobOpportunitiesData) {
                foreach ($jobOpportunitiesData as $jobData) {
                    $jobData['department_id'] = $department->id;
                    JobOpportunities::create($jobData);
                }
            }

            return response()->json(['data' => $department, 'message' => 'Department created successfully'], 201);
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
    public function update(Request $request, Department $department)
    {
        try {
            $validationResult = $this->validator($request);
            if ($validationResult !== null) {
                return $validationResult;
            }

            $departmentData = $request->only(['name', 'description', 'description_video', 'vision', 'mission', 'user_id', 'faculty_id']);
            $departmentData['logo'] = $this->updateFile($request, 'logo', $department->logo, $request->name, 'image');
            $departmentData['image'] = $this->updateFile($request, 'image', $department->image, $request->name, 'image');
            $departmentData['video'] = $this->updateFile($request, 'video', $department->video, $request->name, 'video');
            $this->updateRecord(new Department, $department->id, $departmentData);

            $jobOpportunitiesData = $request->input('job_opportunities');
            if ($jobOpportunitiesData) {
                foreach ($jobOpportunitiesData as $jobData) {
                    $jobId = $jobData['id'] ?? null;
                    if ($jobId) {
                        JobOpportunities::where('id', $jobId)->update([
                            'title' => $jobData['title'],
                            'link' => $jobData['link'],
                            'user_id' => $jobData['user_id'],
                        ]);
                    }
                }
            }

            return response()->json(['data' => $department, 'message' => 'Department updated successfully'], 200);
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
    public function destroy(Department $department)
    {
        try {
            return $this->deleteRecord($department, 'video', 'image', 'logo');
        } catch (ModelNotFoundException $e) {
            return response()->json(['error' => 'Record not found'], 404);
        } catch (QueryException $e) {
            return response()->json(['error' => 'Database error'], 500);
        }
    }
}
