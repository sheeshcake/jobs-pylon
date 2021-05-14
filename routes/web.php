<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\AdminLoginController;
use App\Http\Controllers\UserLoginController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\LogoutController;
use App\Http\Controllers\JobpostController;
use App\Http\Contollers\ApplicantsController;
use App\Http\Controllers\SiteController;
use App\Http\Controllers\ApplicationController;
use App\Http\Controllers\MailController;
use App\Http\Controllers\TakeExamController;
use App\Http\Controllers\ExamController;
use App\Http\Controllers\QuestionsController;
use App\Http\Controllers\AnswersController;
use App\Http\Controllers\ServiceAuthController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::group(["middleware" => 'auth:user'], function(){
    Route::prefix("/user")->group(function(){
        Route::get("/dashboard", [UserController::class, 'index'])->name("user.dashboard");
        Route::get("/profile", [UserController::class, 'index'])->name("user.profile");
    });
    
});


Route:: group(["middleware" => 'auth:admin'], function(){
    Route::prefix("/admin")->group(function(){
        Route::get("/dashboard", [AdminController::class, 'index'])->name("admin.dashboard");
        //JobPost
        Route::get("/jobposts", [JobpostController::class, 'index'])->name("admin.jobposts");
        Route::get("/jobpost/{id}", [JobpostController::class, 'show'])->name("admin.jobpost");
        Route::get("/createpost", [JobpostController::class, 'create'])->name("admin.createpost");
        Route::post("/updatepost", [JobpostController::class, 'update'])->name("admin.updatepost");
        Route::get("/removepost/{id}", [JobpostController::class, 'delete'])->name("admin.removepost");

        //Job Applicants
        Route::get('/applications', [ApplicationController::class, 'index'])->name('admin.applications');
        Route::get('/application/{id}', [ApplicationController::class, 'show'])->name('admin.application');
        Route::post("/updateapplication", [ApplicationController::class, 'update'])->name('admin.updateapplication');
        Route::post('/approve', [ApplicationController::class, 'approve'])->name('admin.approveapplication');
        Route::get("/removeapplication/{id}", [ApplicationContoller::class, 'delete'])->name('admin.removeapplication');

        //Exams
        Route::get("/exams", [ExamController::class, 'index'])->name("admin.exams");
        Route::get("/exam/{id}", [ExamController::class, 'showexam'])->name("admin.exam");
        Route::get("/newexam", [ExamController::class, 'newexam'])->name("admin.newexam");
        Route::post("/addexam", [ExamController::class, 'addexam'])->name("admin.addexam");
        Route::get("/removeexam", [ExamController::class, 'removeexam'])->name("admin.removeexam");
        
        //Questions
        Route::post("/addquestion", [QuestionsController::class, 'addquestion'])->name("admin.addquestion");
        Route::post("/removequestion", [QuestionsController::class, 'removequestion'])->name("admin.removequestion");
        Route::post("/updatequestion", [QuestionsController::class, 'updatequestion'])->name("admin.updatequestion");

        //Answers
        Route::post("/addanswer", [AnswersController::class, 'addanswer'])->name("admin.addanswer");
        Route::post("/removeanswer", [AnswersController::class, 'removeanswer'])->name("admin.removeanswer");
        Route::post("/updateanswer", [AnswersController::class, 'updateanswer'])->name("admin.updateanswer");


    });
});

Route::prefix("/exams")->group(function(){
    Route::get("/", [TakeExamController::class, 'exam'])->name("takeexam");
    Route::post("/submitexam", [TakeExamController::class, 'submitexam'])->name("submitexam");
});



Route::get("/email", [MailController::class, 'approveemail']);

//For Users
Route::get("/login", [UserLoginController::class, 'index'])->name('login');
Route::post('/login', [UserLoginController::class, 'dologin']);

Route::get('auth/{service}', [ServiceAuthController::class, 'redirectToProvider'])->name('login.redirect');
Route::get('auth/{service}/callback', [ServiceAuthController::class, 'handleProviderCallback']);

//For Admins
Route::get("/adminlogin", [AdminLoginController::class, 'index'])->name('adminlogin');;
Route::post("/adminlogin", [AdminLoginController::class, 'dologin']);

Route::get("/logout", [LogoutController::class, 'index']);

Route::get('/', [SiteController::class, 'index']);
Route::get('/jobposts', [SiteController::class, 'showall'])->name('site.jobposts');
Route::get("/jobpost/{id}", [SiteController::class, 'show'])->name('site.jobpost');
Route::post('/jobpost/apply', [ApplicationController::class, 'create'])->name('site.apply');
