<?php

use App\Mail\MyEmail;
use App\Models\UserCourse;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\CourseController;
use App\Http\Controllers\UserCourseController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\UploadController;

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

Route::get('/', [CourseController::class, 'index'])->name('index');

Auth::routes();
Route::get('/register', [RegisterController::class, 'showRegistrationForm'])->name('register');

Route::middleware(['auth'])->group(function () {
    Route::get('course/create', [CourseController::class, 'create'])->name('course.create');
    Route::resource('user', UserController::class);
    Route::resource('usercourse', UserCourseController::class);
    Route::get('usercourse/online/{usercourse}', [UserCourseController::class, 'create_online'])->name('usercourse.online.create');
    Route::get('usercourse/offline/{usercourse}', [UserCourseController::class, 'create_online'])->name('usercourse.offline.create');
    Route::get('payment/{usercourse}', [UserCourseController::class, 'payment'])->name('usercourse.payment');
    Route::get('export', [UserCourseController::class, 'export'])->name('usercourse.export');
});

Route::middleware(['auth', 'admin'])->group(function () {
    Route::resource('course', CourseController::class);
    Route::post('/upload', [UploadController::class, 'store'])->name('upload');
    Route::delete('/revert', [UploadController::class, 'delete'])->name('revert');
});

Route::get('course', [CourseController::class, 'index'])->name('course.index');
Route::get('course/{course}', [CourseController::class, 'show'])->name('course.show');

// Email Test
// Route::get('/tests', function () {
//     $name = 'Ghifari';

//     Mail::to('smartinsight.id@gmail.com')->send(new MyEmail($name));
// });
