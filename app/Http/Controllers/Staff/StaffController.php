<?php

namespace App\Http\Controllers\Staff;

use App\Http\Controllers\Controller;
use App\Models\StaffMembers;
use App\Models\StaffPrograms;
use App\Models\FacultyLeaders;
use App\Models\FacultyAgentStaff;
use App\Models\UniversityLeaders;
use App\Models\Department;
use App\Models\Faculty;
use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Database\QueryException;
use App\Traits\CrudOperationsTrait;
use App\Http\Resources\StaffResource;

class StaffController extends Controller
{
    use CrudOperationsTrait;

    /*
    |--------------------------------------------------------------------------
    | All Staff Members Functions
    |--------------------------------------------------------------------------
    */

    public function index()
    {
        try {
            $getStaffMember = $this->getAllWithRelation(new StaffMembers, ['staffSocial','studyPlan','researches','certificates'],['id', 'name', 'image', 'position', 'description', 'email', 'cv', 'department_id', 'faculty_id']);
            $getStaffProgram = $this->getAllWithRelation(new StaffPrograms, ['staffSocial','studyPlan','researches','certificates'], ['id', 'name', 'image', 'position', 'word', 'email', 'cv', 'department_id']);
            $getFacultyLeaders = $this->getRecord(new FacultyLeaders, []);
            $getFacultyAgentStaff = $this->getRecord(new FacultyAgentStaff, []);
            $getUniversityLeaders = $this->getRecord(new UniversityLeaders, []);
            $getFaculty = $this->getRecord(new Faculty, ['id', 'name']);
            $getDepartment = $this->getRecord(new Department, ['id', 'name']);

            $staffPrograms = StaffResource::collection($getStaffProgram)->sortBy('position');
            $facultyLeaders = StaffResource::collection($getFacultyLeaders)->sortBy('category');
            $facultyAgentStaff = StaffResource::collection($getFacultyAgentStaff);
            $universityLeaders = StaffResource::collection($getUniversityLeaders)->sortBy('position');
            $staffMembers = StaffResource::collection($getStaffMember);

            $members = $universityLeaders
                ->merge($facultyLeaders)
                ->merge($staffPrograms)
                ->merge($facultyAgentStaff)
                ->merge($staffMembers);

            return response()->json(['member' => $members, 'department' => $getDepartment, 'faculty' => $getFaculty], 200);
        } catch (ModelNotFoundException $e) {
            return response()->json(['error' => 'Record not found'], 404);
        } catch (QueryException $e) {
            return response()->json(['error' => 'Database error'], 500);
        }
    }

    /*
    |--------------------------------------------------------------------------
    | Search Staff Members Functions
    |--------------------------------------------------------------------------
    */
    public function search(Request $request)
    {
        try {
            $query = StaffMembers::query();

            if ($request->filled('faculty_id') && $request->filled('department_id') && $request->filled('name')) {
                // Searching by faculty_id, department_id, and name
                $staffFacultyQuery = FacultyLeaders::where('faculty_id', $request->faculty_id)
                    ->where('name', 'like', '%' . $request->name . '%');
                $staffMembersQuery = StaffMembers::where('faculty_id', $request->faculty_id)
                    ->where('department_id', $request->department_id)
                    ->where('name', 'like', '%' . $request->name . '%');
                $staffProgramsQuery = StaffPrograms::where('department_id', $request->department_id)
                    ->where('name', 'like', '%' . $request->name . '%');


                $staffMembers = StaffResource::collection($staffMembersQuery->get());
                $staffFaculty = StaffResource::collection($staffFacultyQuery->get());
                $staffProgram = StaffResource::collection($staffProgramsQuery->get());
                $staff = $staffFaculty->merge($staffMembers)->merge($staffProgram);
                return response()->json(['data' => $staff], 200);
            } elseif ($request->filled('faculty_id') && $request->filled('department_id')) {
                // Searching by faculty_id and department_id
                $facultyLeadersQuery = FacultyLeaders::where('faculty_id', $request->faculty_id)->orderBy('category');
                $staffProgramsQuery = StaffPrograms::where('department_id', $request->department_id)->orderBy('position');
                $staffMembersQuery = StaffMembers::where('faculty_id', $request->faculty_id)->where('department_id', $request->department_id);

                $facultyLeaders = StaffResource::collection($facultyLeadersQuery->get());
                $staffPrograms = StaffResource::collection($staffProgramsQuery->get());
                $staffMembers = StaffResource::collection($staffMembersQuery->get());

                $members = $facultyLeaders->merge($staffPrograms)->merge($staffMembers);
            } elseif ($request->filled('faculty_id') && $request->filled('name')) {
                // Searching by faculty_id and name
                $facultyLeadersQuery = FacultyLeaders::where('faculty_id', $request->faculty_id)
                    ->where('name', 'like', '%' . $request->name . '%')->orderBy('category');
                $facultyAgentStaffQuery = FacultyAgentStaff::where('faculty_id', $request->faculty_id)
                    ->where('name', 'like', '%' . $request->name . '%');
                $staffMembersQuery = StaffMembers::where('faculty_id', $request->faculty_id)
                    ->where('name', 'like', '%' . $request->name . '%');

                $facultyLeaders = StaffResource::collection($facultyLeadersQuery->get());
                $facultyAgentStaff = StaffResource::collection($facultyAgentStaffQuery->get());
                $staffMembers = StaffResource::collection($staffMembersQuery->get());

                $members = $facultyLeaders->merge($facultyAgentStaff)->merge($staffMembers);

                return response()->json(['data' => $members], 200);
            } elseif ($request->filled('faculty_id') && !$request->filled('department_id') && !$request->filled('name')) {
                // Only searching by faculty_id
                $facultyLeadersQuery = FacultyLeaders::where('faculty_id', $request->faculty_id)->orderBy('category');
                $facultyAgentStaffQuery = FacultyAgentStaff::where('faculty_id', $request->faculty_id);

                $facultyLeaders = StaffResource::collection($facultyLeadersQuery->get());
                $facultyAgentStaff = StaffResource::collection($facultyAgentStaffQuery->get());

                $members = $facultyLeaders->merge($facultyAgentStaff);
            } elseif ($request->filled('name')) {
                // Searching by name
                $universityLeadersQuery = UniversityLeaders::where('name', 'like', '%' . $request->name . '%');
                $facultyLeadersQuery = FacultyLeaders::where('name', 'like', '%' . $request->name . '%')->orderBy('category');
                $staffProgramsQuery = StaffPrograms::where('name', 'like', '%' . $request->name . '%')->orderBy('position');
                $facultyAgentStaffQuery = FacultyAgentStaff::where('name', 'like', '%' . $request->name . '%');
                $staffMembersQuery = StaffMembers::where('name', 'like', '%' . $request->name . '%');

                $universityLeaders = StaffResource::collection($universityLeadersQuery->get());
                $facultyLeaders = StaffResource::collection($facultyLeadersQuery->get());
                $staffPrograms = StaffResource::collection($staffProgramsQuery->get());
                $facultyAgentStaff = StaffResource::collection($facultyAgentStaffQuery->get());
                $staffMembers = StaffResource::collection($staffMembersQuery->get());

                $members = $universityLeaders->merge($facultyLeaders)->merge($staffPrograms)->merge($facultyAgentStaff)->merge($staffMembers);
            } else {
                return response()->json(['error' => 'Invalid search criteria'], 400);
            }

            return response()->json(['data' => $members], 200);
        } catch (ModelNotFoundException $e) {
            return response()->json(['error' => 'Record not found'], 404);
        } catch (QueryException $e) {
            return response()->json(['error' => 'Database error' . $e], 500);
        }
    }
}
