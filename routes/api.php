<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
// Staff Model
use App\Http\Controllers\Staff\StaffSocialController;
use App\Http\Controllers\Staff\StaffController;
use App\Http\Controllers\Staff\StaffProgramsController;
use App\Http\Controllers\Staff\StaffMemberController;
// Applying Model
use App\Http\Controllers\Applying\JobApplicationsController;
use App\Http\Controllers\Applying\ApplyController;
use App\Http\Controllers\applying\ApplyingController;
use App\Http\Controllers\applying\ApplyStudiesController;
use App\Http\Controllers\applying\ApplyStaffController;
// Department Model
use App\Http\Controllers\Department\DepartmentController;
use App\Http\Controllers\Department\StudentProjectController;
use App\Http\Controllers\Department\StudyPlanController;
use App\Http\Controllers\Department\JobOpportunitiesController;
// Faculty Model
use App\Http\Controllers\Faculty\FacultyAgentStaffController;
use App\Http\Controllers\Faculty\FacultyAgentController;
use App\Http\Controllers\Faculty\FacultyController;
// University Model
use App\Http\Controllers\University\ContactController;
use App\Http\Controllers\University\AboutUniversityController;
use App\Http\Controllers\University\DetailController;
use App\Http\Controllers\University\FeedbackController;
use App\Http\Controllers\University\PresidentAlertController;
use App\Http\Controllers\University\SocialLinkController;
use App\Http\Controllers\University\UniversityLeadersController;
use App\Http\Controllers\University\PoliticsController;
use App\Http\Controllers\University\LeaderCouncilController;
// Minorities Model
use App\Http\Controllers\Posts\PostsController;
use App\Http\Controllers\grades\GradesController;
use App\Http\Controllers\Users\UserController;
use App\Http\Controllers\Layout\LayoutController;
use App\Http\Controllers\Home\HomeController;


/*
|--------------------------------------------------------------------------
| Authentication Routes
|--------------------------------------------------------------------------
*/

require __DIR__ . '/auth.php';

/*
|--------------------------------------------------------------------------
| Routes accessible only for authenticated users
|--------------------------------------------------------------------------
*/
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
Route::prefix('home')->group(function () {
    Route::get('/', [HomeController::class, 'index']);
});

Route::prefix('layout')->group(function () {
    Route::get('/', [LayoutController::class, 'index']);
});

Route::prefix('grade')->group(function () {
    Route::get('/', [GradesController::class, 'index']);
    Route::post('/details', [GradesController::class, 'show']);

    Route::middleware(['checkRole:superAdmin,admin'])->group(function () {
        Route::post('/', [GradesController::class, 'store']);
        Route::post('/update', [GradesController::class, 'update']);
    });
});

/*
|--------------------------------------------------------------------------
| Applying Routes
|--------------------------------------------------------------------------
*/
Route::prefix('apply-content')->group(function () {
    // Display staff application details
    Route::get('/staff', [ApplyController::class, 'displayApplyStaff']);
    // Retrieve available faculties data
    Route::get('/faculties', [ApplyController::class, 'getAvailableFaculties']);
    // Display student application details
    Route::post('/student', [ApplyController::class, 'displayApplyStudent']);
    // Create job application
    Route::post('/create-application', [ApplyController::class, 'createApplication']);
});

Route::prefix('applying')->group(function () {
    Route::get('/staff', [ApplyingController::class, 'getStaff']);
    Route::get('/student', [ApplyingController::class, 'getStudent']);
    Route::get('/{id}', [ApplyingController::class, 'show']);

    Route::middleware(['checkRole:superAdmin,admin,editor'])->group(function () {
    Route::post('/', [ApplyingController::class, 'store']);
    Route::post('/{applying}', [ApplyingController::class, 'update']);
    Route::delete('/{applying}', [ApplyingController::class, 'destroy']);
    });
});

Route::prefix('apply-staff')->group(function () {
    Route::get('/', [ApplyStaffController::class, 'index']);
    Route::get('/{id}', [ApplyStaffController::class, 'show']);
    Route::middleware(['checkRole:superAdmin,admin,editor'])->group(function () {
    Route::post('/', [ApplyStaffController::class, 'store']);
    Route::post('/{applyStaff}', [ApplyStaffController::class, 'update']);
    Route::delete('/{applyStaff}', [ApplyStaffController::class, 'destroy']);
    });
});

Route::prefix('apply-studies')->group(function () {
    Route::get('/', [ApplyStudiesController::class, 'index']);
    Route::get('/{id}', [ApplyStudiesController::class, 'show']);
    Route::middleware(['checkRole:superAdmin,admin,editor'])->group(function () {
    Route::post('/', [ApplyStudiesController::class, 'store']);
    Route::post('/{applyStudies}', [ApplyStudiesController::class, 'update']);
    Route::delete('/{applyStudies}', [ApplyStudiesController::class, 'destroy']);
    });
});

/*
|--------------------------------------------------------------------------
| Routes for Job Applications
|--------------------------------------------------------------------------
*/
Route::prefix('job-applications')->group(function () {
    Route::middleware(['checkRole:superAdmin,admin'])->group(function () {
    Route::get('/', [JobApplicationsController::class, 'index']);
    Route::get('/{id}', [JobApplicationsController::class, 'show']);
    Route::delete('/{JobApplications}', [JobApplicationsController::class, 'destroy']);
    });
});

/*
|--------------------------------------------------------------------------
| Department Routes
|--------------------------------------------------------------------------
*/

Route::prefix('department-content')->group(function () {
    Route::get('/{id}', [DepartmentController::class, 'displayDepartment']);
});
Route::prefix('department')->group(function () {
    Route::get('/', [DepartmentController::class, 'getDepartment']);
    Route::get('/{id}', [DepartmentController::class, 'show']);

    Route::middleware(['checkRole:superAdmin,admin,editor'])->group(function () {
    Route::post('/', [DepartmentController::class, 'store']);
    Route::post('/{department}', [DepartmentController::class, 'update']);
    Route::delete('/{department}', [DepartmentController::class, 'destroy']);
    });
});

/*
|--------------------------------------------------------------------------
| Study Plan Routes
|--------------------------------------------------------------------------
*/
Route::prefix('study-plans')->group(function () {
    Route::get('/', [StudyPlanController::class, 'index']);
    Route::get('/department/{id}', [StudyPlanController::class, 'departmentStudyPlan']);
    Route::get('/{id}', [StudyPlanController::class, 'show']);

    Route::middleware(['checkRole:superAdmin,admin,editor'])->group(function () {
    Route::post('/{studyPlan}', [StudyPlanController::class, 'update']);
    Route::delete('/{studyPlan}', [StudyPlanController::class, 'destroy']);
    });
});

/*
|--------------------------------------------------------------------------
| Student Project Routes
|--------------------------------------------------------------------------
*/
Route::prefix('student-projects')->group(function () {
    Route::get('/', [StudentProjectController::class, 'index']);
    Route::get('/department/{id}', [StudentProjectController::class, 'departmentProject']);
    Route::get('/{id}', [StudentProjectController::class, 'show']);

    Route::middleware(['checkRole:superAdmin,admin,editor'])->group(function () {
    Route::post('/', [StudentProjectController::class, 'store']);
    Route::post('/{studentProject}', [StudentProjectController::class, 'update']);
    Route::delete('/{studentProject}', [StudentProjectController::class, 'destroy']);
    });
});

/*
|--------------------------------------------------------------------------
| Job Opportunities Routes
|--------------------------------------------------------------------------
*/
Route::prefix('job-opportunities')->group(function () {
    Route::get('/', [JobOpportunitiesController::class, 'index']);
    Route::get('/{id}', [JobOpportunitiesController::class, 'show']);

    Route::middleware(['checkRole:superAdmin,admin,editor'])->group(function () {
    Route::post('/', [JobOpportunitiesController::class, 'store']);
    Route::post('/{jobOpportunity}', [JobOpportunitiesController::class, 'update']);
    Route::delete('/{jobOpportunity}', [JobOpportunitiesController::class, 'destroy']);
    });
});

/*
|--------------------------------------------------------------------------
| Faculty Routes
|--------------------------------------------------------------------------
*/
Route::prefix('faculty-content')->group(function () {
    Route::get('/{id}', [FacultyController::class, 'displayFaculty']);
});

Route::prefix('faculty')->group(function () {
    Route::get('/', [FacultyController::class, 'index']);
    Route::get('/{id}', [FacultyController::class, 'show']);

    Route::middleware(['checkRole:superAdmin,admin,editor'])->group(function () {
    Route::post('/', [FacultyController::class, 'store']);
    Route::post('/{faculty}', [FacultyController::class, 'update']);
    Route::delete('/{faculty}', [FacultyController::class, 'destroy']);
    });
});

/*
|--------------------------------------------------------------------------
| Faculty Agents Routes
|--------------------------------------------------------------------------
*/
Route::prefix('faculty-agents-content')->group(function () {
    Route::get('/', [FacultyAgentController::class, 'displayFacultyAgent']);
});
Route::prefix('faculty-agents')->group(function () {
    Route::get('/{id}', [FacultyAgentController::class, 'show']);
    Route::middleware(['checkRole:superAdmin,admin,editor'])->group(function () {
    Route::post('/', [FacultyAgentController::class, 'store']);
    Route::post('/{facultyAgent}', [FacultyAgentController::class, 'update']);
    Route::delete('/{facultyAgent}', [FacultyAgentController::class, 'destroy']);
    });
});

Route::prefix('agent-staff')->group(function () {
    Route::get('/', [FacultyAgentStaffController::class, 'index']);
    Route::get('/{id}', [FacultyAgentStaffController::class, 'show']);

    Route::middleware(['checkRole:superAdmin,admin,editor'])->group(function () {
    Route::post('/', [FacultyAgentStaffController::class, 'store']);
    Route::post('/{facultyAgentStaff}', [FacultyAgentStaffController::class, 'update']);
    Route::delete('/{facultyAgentStaff}', [FacultyAgentStaffController::class, 'destroy']);
    });
});

/*
|--------------------------------------------------------------------------
| Posts API Routes
|--------------------------------------------------------------------------
*/
Route::prefix('posts')->group(function () {
    // Display articles
    Route::get('/articles', [PostsController::class, 'displayArticles']);
    // Display news
    Route::get('/news', [PostsController::class, 'displayNews']);
    // Get a specific post by ID
    Route::get('/{id}', [PostsController::class, 'show']);

    Route::middleware(['checkRole:superAdmin,admin,editor,publisher'])->group(function () {
    // Create a new post
    Route::post('/', [PostsController::class, 'store']);
    // Update an existing post by ID
    Route::post('/{post}', [PostsController::class, 'update']);
    // Delete a post by ID
    Route::delete('/{post}', [PostsController::class, 'destroy']);
    });
});

/*
|--------------------------------------------------------------------------
| Staff API Routes
|--------------------------------------------------------------------------
*/
Route::prefix('staff-content')->group(function () {
    Route::get('/', [StaffController::class, 'index']);
    Route::post('/search', [StaffController::class, 'search']);
});

Route::prefix('staff-members')->group(function () {
    Route::get('/', [StaffMemberController::class, 'index']);
    Route::get('/{id}', [StaffMemberController::class, 'show']);

    Route::middleware(['checkRole:superAdmin,admin,editor'])->group(function () {
    Route::post('/', [StaffMemberController::class, 'store']);
    Route::post('/{staffMember}', [StaffMemberController::class, 'update']);
    Route::delete('/{staffMember}', [StaffMemberController::class, 'destroy']);
    });
});

Route::prefix('staff-programs')->group(function () {
    Route::get('/', [StaffProgramsController::class, 'index']);
    Route::get('/{staffProgram}', [StaffProgramsController::class, 'show']);

    Route::middleware(['checkRole:superAdmin,admin,editor'])->group(function () {
    Route::post('/', [StaffProgramsController::class, 'store']);
    Route::post('/{staffProgram}', [StaffProgramsController::class, 'update']);
    Route::delete('/{staffProgram}', [StaffProgramsController::class, 'destroy']);
    });
});

Route::prefix('staff-social')->group(function () {
    Route::middleware(['checkRole:superAdmin,admin,editor'])->group(function () {
    Route::post('/', [StaffSocialController::class, 'store']);
    Route::post('/{staffSocial}', [StaffSocialController::class, 'update']);
    Route::delete('/{staffSocial}', [StaffSocialController::class, 'destroy']);
    });
});

/*
|--------------------------------------------------------------------------
| University API Routes
|--------------------------------------------------------------------------
*/
Route::prefix('about-content')->group(function () {
    Route::get('/', [AboutUniversityController::class, 'index']);
    Route::get('/{id}', [AboutUniversityController::class, 'show']);
    Route::middleware(['checkRole:superAdmin,admin,editor'])->group(function () {
    Route::post('/', [AboutUniversityController::class, 'store']);
    Route::post('/{university}', [AboutUniversityController::class, 'update']);
    Route::delete('/{university}', [AboutUniversityController::class, 'destroy']);
    });
});

Route::prefix('university-leaders')->group(function () {
    Route::get('/', [UniversityLeadersController::class, 'index']);
    Route::get('//{id}', [UniversityLeadersController::class, 'show']);

    Route::middleware(['checkRole:superAdmin,admin,editor'])->group(function () {
    Route::post('/', [UniversityLeadersController::class, 'store']);
    Route::post('/{universityLeader}', [UniversityLeadersController::class, 'update']);
    Route::delete('/{universityLeader}', [UniversityLeadersController::class, 'destroy']);
    });
});

Route::prefix('university-details')->group(function () {
    Route::get('/', [DetailController::class, 'index']);
    Route::get('/{id}', [DetailController::class, 'show']);

    Route::middleware(['checkRole:superAdmin,admin,editor'])->group(function () {
    Route::post('/', [DetailController::class, 'store']);
    Route::post('/{detail}', [DetailController::class, 'update']);
    Route::delete('/{detail}', [DetailController::class, 'destroy']);
    });
});

Route::prefix('university-politics')->group(function () {
    Route::get('/', [PoliticsController::class, 'index']);
    Route::get('/{id}', [PoliticsController::class, 'show']);
    Route::middleware(['checkRole:superAdmin,admin,editor'])->group(function () {
    Route::post('/', [PoliticsController::class, 'store']);
    Route::post('/{politics}', [PoliticsController::class, 'update']);
    Route::delete('/{politics}', [PoliticsController::class, 'destroy']);
    });
});

Route::prefix('university-social')->group(function () {
    Route::get('/', [SocialLinkController::class, 'index']);
    Route::get('/{id}', [SocialLinkController::class, 'show']);
    Route::middleware(['checkRole:superAdmin,admin,editor'])->group(function () {
    Route::post('/', [SocialLinkController::class, 'store']);
    Route::post('/{socialLink}', [SocialLinkController::class, 'update']);
    Route::delete('/{socialLink}', [SocialLinkController::class, 'destroy']);
    });
});

Route::prefix('president-alerts')->group(function () {
    Route::post('/', [PresidentAlertController::class, 'store']);

    Route::middleware(['checkRole:superAdmin,admin,editor'])->group(function () {
    Route::get('/', [PresidentAlertController::class, 'index']);
    Route::get('/{id}', [PresidentAlertController::class, 'show']);
    Route::delete('/{presidentAlert}', [PresidentAlertController::class, 'destroy']);
    });
});

Route::prefix('leader-council')->group(function () {
    Route::get('/', [LeaderCouncilController::class, 'index']);
    Route::get('/{id}', [LeaderCouncilController::class, 'show']);
    Route::middleware(['checkRole:superAdmin,admin,editor'])->group(function () {
    Route::post('/', [LeaderCouncilController::class, 'store']);
    Route::post('/{leaderCouncil}', [LeaderCouncilController::class, 'update']);
    Route::delete('/{leaderCouncil}', [LeaderCouncilController::class, 'destroy']);
    });
});

Route::prefix('message-feedbacks')->group(function () {
    Route::middleware(['checkRole:superAdmin,admin,editor'])->group(function () {
    Route::get('/', [FeedbackController::class, 'index']);
    Route::get('/{id}', [FeedbackController::class, 'show']);
    Route::delete('/{feedback}', [FeedbackController::class, 'destroy']);
    });
});

Route::prefix('contact-content')->group(function () {
    Route::middleware(['checkRole:superAdmin,admin,editor'])->group(function () {
    Route::get('/', [ContactController::class, 'index']);
    Route::post('/feedback', [ContactController::class, 'storeFeedback']);
    });
});
