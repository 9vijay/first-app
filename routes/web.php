<?php

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\AttendenceController;
use App\Http\Controllers\Admin\HrmController;
use App\Http\Controllers\Admin\LeavesController;
use App\Http\Controllers\Admin\ModuleController;
use App\Http\Controllers\FallbackController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\Admin\AdminUserController;
use App\Http\Controllers\Auth\ForgotPasswordController;
use App\Http\Controllers\Admin\RoleController;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Admin\PermissionController;
use App\Http\Controllers\Admin\SalaryController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\StudentController;
use App\Http\Resources\UserResource;
use App\Models\User;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
/*
|-------------------------------------------------------------------------
| User Routes
|--------------------------------------------------------------------------
*/
Route::get('/', function () {
    return view('login.login');
});
Route::get('/admin', [AdminController::class, 'show'])->name('showlogin');
Route::post('/admin', [AdminController::class, 'login'])->name('adminlogin');
Route::get('/dashboard', [AdminController::class, 'dashboard'])->name('dashboard');
Route::group(['middleware' => ['auth', 'admin']], function () {
    Route::resource('roles', RoleController::class);
    Route::get('/admin/student/index', [StudentController::class, 'index'])->name('studentlist');
    Route::get('/admin/student/insert', [StudentController::class,'insert'])->name('studentcreate');
    Route::get('/admin/student/update', [StudentController::class, 'update'])->name('studentupdate');
    Route::get('/admin/student/delete', [StudentController::class, 'delete'])->name('studentdel');

});
Route::get('/admin/users', [AdminUserController ::class, 'index'])->name('adminuserlist');
Route::get('/admin/users/create', [AdminUserController ::class, 'create'])->name('adminusercreate');
Route::get('/admin/users/edit/{id}', [AdminUserController ::class, 'edit'])->name('adminuseredit');
Route::get('/admin/users/show/{id}', [AdminUserController ::class, 'show'])->name('adminusershow');
Route::post('/admin/users/store', [AdminUserController ::class, 'store'])->name('adminuserstore');
Route::post('/admin/users/update/{id}', [AdminUserController ::class, 'update'])->name('adminuserupdate');

Route::get('/admin/hrm', [HrmController::class, 'index'])->name('hrmlist');
Route::get('/admin/salary', [SalaryController::class, 'index'])->name('salarylist');
Route::get('/admin/leaves', [LeavesController::class, 'index'])->name('leaveslist');
Route::get('/admin/attendence', [AttendenceController::class, 'index'])->name('attendencelist');


Route::get('/login', [LoginController::class, 'show'])->name('showlogin');
Route::post('/login',[LoginController::class,'login'])->name('login');
Route::get('/registration', [RegisterController::class, 'show'])->name('show');
Route::post('/registration',[RegisterController::class,'register'])->name('register');
Route::get('/profile',[UserController::class,'profile'])->name('profile');
Route::get('/logout',[LoginController::class,'logout'])->name('logout');
Route::group(['middleware' => 'userauth'], function() {
    Route::resource('user', UserController::class); 
});

Route::get('forget-password', [ForgotPasswordController::class, 'showForgetPasswordForm'])->name('forget.password.get');
Route::post('forget-password', [ForgotPasswordController::class, 'submitForgetPasswordForm'])->name('forget.password.post'); 
Route::get('reset-password/{token}', [ForgotPasswordController::class, 'showResetPasswordForm'])->name('reset.password.get');
Route::post('reset-password', [ForgotPasswordController::class, 'submitResetPasswordForm'])->name('reset.password.post');

Route::get('/index', [ModuleController::class, 'index'])->name('index');
Route::get('/index', [PermissionController::class, 'index'])->name('permission');
Route::get('/create', [PermissionController::class, 'create'])->name('permissioncreate');

Route::get('/user/{id}', function (string $id) {
    return new UserResource(User::findOrFail($id));
});
Route::get('/users', function () {
    return UserResource::collection(User::all());
});
