<?php

namespace App\Http\Controllers\grades;

use App\Http\Controllers\Controller;
use App\Models\Grade;
use App\Models\Faculty;
use App\Models\Department;
use App\Models\GradeStudent;
use Illuminate\Http\Request;
use PhpOffice\PhpSpreadsheet\IOFactory;
use Illuminate\Support\Facades\Validator;
use App\Traits\CrudOperationsTrait;

class GradesController extends Controller
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
            $departments = Department::select('name', 'id', 'faculty_id')->get();
            $faculties = Faculty::select('name', 'id')->get();

            return response()->json(["departments" => $departments, 'faculties' =>  $faculties], 200);
        } catch (\Exception $e) {
            return response()->json(['error' => 'Internal server error'], 500);
        }
    }

    /*
    |--------------------------------------------------------------------------
    | Show Function
    |--------------------------------------------------------------------------
    */
    public function show(Request $request)
    {
        try {
            $validator = Validator::make($request->all(), [
                'sitting_num' => 'required|numeric',
                'department_id' => 'required|exists:departments,id',
            ]);

            if ($validator->fails()) {
                return response()->json(['error' => 'Validation failed', 'details' => $validator->errors()], 400);
            }

            $student = GradeStudent::with(['department', 'department.faculty'])
                ->where('sitting_num', $request->sitting_num)
                ->where('department_id', $request->department_id)
                ->first();

            if ($student) {
                $grades = $student->grades->map(function ($grade) {
                    return [
                        'subject' => $grade->subject,
                        'score' => $grade->score,
                    ];
                });

                return response([
                    'student' => [
                        'id' => $student->id,
                        'sitting_num' => $student->sitting_num,
                        'name' => $student->name,
                        'department' => $student->department->name,
                        'faculty' => $student->department->faculty->name,
                        'grades' => $grades
                    ]
                ], 200);
            } else {
                return response(['error' => 404], 404);
            }
        } catch (\Exception $e) {
            return response()->json(['error' => 'Internal server error'], 500);
        }
    }

    public function store(Request $request)
    {
        try {
            $validator = $this->validateRequestData($request, [
                'department_id' => 'required|integer',
                'file' => 'required|file|mimes:xlsx',
                'academic_year' => 'required|integer',
            ]);

            if ($validator !== null) {
                return $validator;
            }

            $departmentId = $request->department_id;
            $academicYear = $request->academic_year;
            $file = $request->file('file');

            $this->processFile($file, $departmentId, $academicYear);

            return response()->json(['success' => 'File uploaded successfully!'], 200);
        } catch (\Exception $e) {
            return response()->json(['error' => 'Internal server error'], 500);
        }
    }

    public function update(Request $request)
    {
        try {
            $validator = $this->validateRequestData($request, [
                'department_id' => 'required|integer',
                'file' => 'required|file|mimes:xlsx',
                'academic_year' => 'required|integer',
            ]);

            if ($validator !== null) {
                return $validator;
            }

            $departmentId = $request->department_id;
            $academicYear = $request->academic_year;
            $file = $request->file('file');

            GradeStudent::where('department_id', $departmentId)
                ->where('academic_year', $academicYear)
                ->delete();

            $this->processFile($file, $departmentId, $academicYear);

            return response()->json(['success' => 'Data updated successfully!'], 200);
        } catch (\Exception $e) {
            return response()->json(['error' => 'Duplicate data found'], 409);
        }
    }

    private function processFile($file, $departmentId, $academicYear)
    {
        $spreadsheet = IOFactory::load($file);
        $data = $spreadsheet->getActiveSheet()->toArray();

        $header = array_shift($data);

        foreach ($data as $row) {
            $filteredRow = array_filter($row, function ($value) {
                return $value !== null && $value !== '';
            });

            if (!empty($filteredRow[1])) {
                $this->saveStudentGrade($filteredRow, $departmentId, $header, $academicYear);
            }
        }
    }

    private function saveStudentGrade($row, $departmentId, $header, $academicYear)
    {
        $student = GradeStudent::firstOrCreate(
            ['sitting_num' => $row[1], 'department_id' => $departmentId, 'academic_year' => $academicYear],
            ['name' => $row[2]]
        );

        foreach (array_slice($header, 3) as $key => $subject) {
            if (!empty($subject) && isset($row[$key + 3])) {
                $student->grades()->updateOrCreate(
                    ['subject' => $subject],
                    ['score' => $row[$key + 3]]
                );
            }
        }
    }
}
