<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Events\EventController;
use App\Http\Controllers\Jobs\JobController;
use App\Http\Controllers\Posts\PostController;
use App\Http\Controllers\Faculty\DepartmentController;
use App\Http\Controllers\Faculty\FacultyController;
use App\Http\Controllers\Faculty\AboutUniversityController;
use App\Http\Controllers\Faculty\FacultyMemberController;
use App\Http\Controllers\Faculty\StudentProjectsController;
use App\Http\Controllers\Faculty\SupervisoryTeamController;
use App\Http\Controllers\Faculty\StudyPlanController;
use App\Http\Controllers\Details\DetailController;
use App\Http\Controllers\applying\ApplyingController;
use App\Http\Controllers\applying\ApplyingStudyController;
use App\Http\Controllers\grades\GradesController;
use App\Http\Controllers\Users\UserController;

/*
|--------------------------------------------------------------------------
| Authentication Routes
|--------------------------------------------------------------------------
*/

require __DIR__ . '/auth.php';

// Routes accessible only for authenticated users
Route::middleware(['auth:sanctum'])->get('/user', function (Request $request) {
    return $request->user();
});

/*
|--------------------------------------------------------------------------
| Users Routes
|--------------------------------------------------------------------------
*/

Route::prefix('users')->middleware(['auth:sanctum', 'checkRole:superAdmin,admin'])->group(function () {
    Route::get('/', [UserController::class, 'index']);
    Route::get('/{id}', [UserController::class, 'show']);
    Route::post('/', [UserController::class, 'store']);
    Route::post('/{id}', [UserController::class, 'update']);
    Route::delete('/{id}', [UserController::class, 'destroy']);
});

/*
|--------------------------------------------------------------------------
| Routes CRUD Operation For Basic Categories of The WebSite
|--------------------------------------------------------------------------
*/

Route::prefix('events')->group(function () {
    Route::get('/moderators', [EventController::class, 'getModerators']);
    Route::get('/', [EventController::class, 'index']);
    Route::get('/{id}', [EventController::class, 'show']);
    // Route::middleware(['checkRole:superAdmin,admin,editor,publisher'])->group(function () {
    Route::post('/', [EventController::class, 'store']);
    Route::post('/{event}', [EventController::class, 'update']);
    Route::delete('/{event}', [EventController::class, 'destroy']);
    // });
});

Route::prefix('posts')->group(function () { 
    Route::get('/', [PostController::class, 'index']);
    Route::get('/{id}', [PostController::class, 'show']);
    // Route::middleware(['checkRole:superAdmin,admin,editor,publisher'])->group(function () {
    Route::post('/', [PostController::class, 'store']);
    Route::post('/{post}', [PostController::class, 'update']);
    Route::delete('/{post}', [PostController::class, 'destroy']);
});
// });

Route::prefix('department')->group(function () {
    Route::get('/', [DepartmentController::class, 'index']);
    Route::get('/{id}', [DepartmentController::class, 'show']);
    // Route::middleware(['checkRole:superAdmin,admin,editor'])->group(function () {
    Route::post('/', [DepartmentController::class, 'store']);
    Route::post('/{department}', [DepartmentController::class, 'update']);
    Route::delete('/{department}', [DepartmentController::class, 'destroy']);
    // });
});

Route::prefix('jobs')->group(function () {
    // Route::middleware(['checkRole:superAdmin,admin'])->group(function () {
    Route::get('/', [JobController::class, 'index']);
    Route::get('/{id}', [JobController::class, 'show']);
    Route::delete('/{job}', [JobController::class, 'destroy']);
    // });
    Route::post('/', [JobController::class, 'store']);
    Route::post('/{job}', [JobController::class, 'update']);
});

Route::prefix('faculty')->group(function () {
    Route::get('/dropdown', [FacultyController::class, 'detailsFaculty']);
    Route::get('/', [FacultyController::class, 'index']);
    Route::get('/{id}', [FacultyController::class, 'show']);
    // Route::middleware(['checkRole:superAdmin,admin,editor'])->group(function () {
    Route::post('/', [FacultyController::class, 'store']);
    Route::post('/{faculty}', [FacultyController::class, 'update']);
    Route::delete('/{faculty}', [FacultyController::class, 'destroy']);
    // });
});

Route::prefix('about')->group(function () {
    Route::get('/', [AboutUniversityController::class, 'index']);
    Route::get('/{id}', [AboutUniversityController::class, 'show']);
    // Route::middleware(['checkRole:superAdmin,admin,editor'])->group(function () {
    Route::post('/', [AboutUniversityController::class, 'store']);
    Route::post('/{aboutUniversity}', [AboutUniversityController::class, 'update']);
    Route::delete('/{aboutUniversity}', [AboutUniversityController::class, 'destroy']);
    // });
});

Route::prefix('staff')->group(function () {
    Route::get('/search', [FacultyMemberController::class, 'search']);
    Route::get('/', [FacultyMemberController::class, 'index']);
    Route::get('/{id}', [FacultyMemberController::class, 'show']);
    // Route::middleware(['checkRole:superAdmin,admin,editor'])->group(function () {
    Route::post('/', [FacultyMemberController::class, 'store']);
    Route::post('/{facultyMember}', [FacultyMemberController::class, 'update']);
    Route::delete('/{facultyMember}', [FacultyMemberController::class, 'destroy']);
    // });
});


Route::prefix('supervisory')->group(function () {
    Route::get('/', [SupervisoryTeamController::class, 'index']);
    Route::get('/{id}', [SupervisoryTeamController::class, 'show']);
    // Route::middleware(['checkRole:superAdmin,admin,editor'])->group(function () {
    Route::post('/', [SupervisoryTeamController::class, 'store']);
    Route::post('/{supervisoryTeam}', [SupervisoryTeamController::class, 'update']);
    Route::delete('/{supervisoryTeam}', [SupervisoryTeamController::class, 'destroy']);
    // });
});

Route::prefix('StudyPlan')->group(function () {
    Route::get('/lectures', [StudyPlanController::class, 'getLectures']);
    Route::get('/', [StudyPlanController::class, 'index']);
    Route::get('/{id}', [StudyPlanController::class, 'show']);
    // Route::middleware(['checkRole:superAdmin,admin,editor'])->group(function () {
    Route::post('/', [StudyPlanController::class, 'store']);
    Route::post('/{studyPlan}', [StudyPlanController::class, 'update']);
    Route::delete('/{studyPlan}', [StudyPlanController::class, 'destroy']);
    // });
});

Route::prefix('projects')->group(function () {
    Route::get('/', [StudentProjectsController::class, 'index']);
    Route::get('/{id}', [StudentProjectsController::class, 'show']);
    // Route::middleware(['checkRole:superAdmin,admin,editor'])->group(function () {
    Route::post('/', [StudentProjectsController::class, 'store']);
    Route::post('/{studentProject}', [StudentProjectsController::class, 'update']);
    Route::delete('/{studentProject}', [StudentProjectsController::class, 'destroy']);
    // });
});

Route::prefix('detailed')->group(function () {
    Route::get('/', [DetailController::class, 'index']);
    Route::get('/{id}', [DetailController::class, 'show']);
    // Route::middleware(['checkRole:superAdmin,admin,editor'])->group(function () {
    Route::post('/', [DetailController::class, 'store']);
    Route::post('/{detail}', [DetailController::class, 'update']);
    Route::delete('/{detail}', [DetailController::class, 'destroy']);
    // });
});

Route::prefix('applying')->group(function () {
    // Route::middleware(['checkRole:superAdmin,admin'])->group(function () {
    Route::get('/', [ApplyingController::class, 'index']);
    Route::get('/{id}', [ApplyingController::class, 'show']);
    Route::delete('/{applying}', [ApplyingController::class, 'destroy']);
    // });
    Route::post('/', [ApplyingController::class, 'store']);
    Route::post('/{applying}', [ApplyingController::class, 'update']);
});

Route::prefix('studies')->group(function () {
    // Route::middleware(['checkRole:superAdmin,admin'])->group(function () {
    Route::get('/', [ApplyingStudyController::class, 'index']);
    Route::get('/{id}', [ApplyingStudyController::class, 'show']);
    Route::delete('/{applyingStudy}', [ApplyingStudyController::class, 'destroy']);
    // });
    Route::post('/', [ApplyingStudyController::class, 'store']);
    Route::post('/{applyingStudy}', [ApplyingStudyController::class, 'update']);
});

Route::prefix('grade')->group(function () {
    Route::get('/', [GradesController::class, 'index']);
    Route::post('/details', [GradesController::class, 'show']);
    // Route::middleware(['checkRole:superAdmin,admin,editor,publisher'])->group(function () {
    Route::post('/', [GradesController::class, 'store']);
    Route::post('/update', [GradesController::class, 'update']);
    // });
});
