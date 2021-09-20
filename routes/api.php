<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\UserController;
use App\Http\Controllers\Api\CourseController;


Route::post("register", [UserController::class, "register"]);
Route::post("login", [UserController::class, "login"]);

Route::group(["middleware" => ["auth:api"]], function(){
        Route::get("profile", [UserController::class, "profile"]);
        Route::get("logout", [UserController::class, "logout"]);
        //COURSE API ROUTES
        Route::post("course-enroll", [CourseController::class, "courseEnrollment"]);
        Route::get("total-courses", [CourseController::class, "totalCourses"]);
        Route::get("delete-course/{id}", [CourseController::class, "deleteCourse"]);
});
Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
