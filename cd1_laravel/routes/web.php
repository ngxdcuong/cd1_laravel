<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\ShiftController;
use App\Http\Controllers\EmployeeShiftController;
use App\Http\Controllers\PositionController;
use App\Http\Controllers\SalaryController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AttendanceController;
use App\Http\Controllers\NewsController;
use App\Http\Controllers\Admin\PostController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AboutController;
use App\Http\Controllers\RecruitmentController;
use App\Http\Controllers\LocationController;

Route::resource('locations', LocationController::class);
Route::get('/home', [HomeController::class, 'index'])->name('home');
Route::get('/recruitments', [RecruitmentController::class, 'index'])->name('recruitments.index');
Route::get('/recruitments/manager', [RecruitmentController::class, 'manager'])->name('recruitments.manager');
Route::post('/recruitments/{id}/approve', [RecruitmentController::class, 'approve'])->name('recruitments.approve');
Route::post('/recruitments/{id}/reject', [RecruitmentController::class, 'reject'])->name('recruitments.reject');


Route::get('/tuyen-dung', [RecruitmentController::class, 'create'])->name('recruitments.create');
Route::post('/tuyen-dung', [RecruitmentController::class, 'store'])->name('recruitments.store');


// 🔹 Trang chủ
Route::get('/', function () {
    return view('welcome');
});

// 🔹 Trang chủ có Controller
Route::get('/home', [HomeController::class, 'index'])->name('home');

// 🔹 Quản lý thông tin About
Route::prefix('about')->group(function () {
    Route::get('/', [AboutController::class, 'index'])->name('about.index');
    Route::get('/create', [AboutController::class, 'create'])->name('about.create');
    Route::post('/', [AboutController::class, 'store'])->name('about.store');
});
Route::get('/about_manager', [AboutController::class, 'manager'])->name('about.about_manager');
Route::get('/about/{id}', [AboutController::class, 'show'])->name('about.show');
Route::get('/about/{id}', [AboutController::class, 'show'])->name('about.detail');
    Route::get('/about/{id}/edit', [AboutController::class, 'edit'])->name('about.edit');
    Route::put('/about/{id}', [AboutController::class, 'update'])->name('about.update');
    Route::delete('/about/{id}', [AboutController::class, 'destroy'])->name('about.destroy');



// 🔹 Quản lý bài viết trong Admin
Route::prefix('admin')->middleware(['auth', 'admin'])->group(function () {
    Route::resource('posts', PostController::class)->names('admin.posts');
});

// 🔹 Quản lý tin tức
Route::prefix('news')->group(function () {
    Route::get('/', [NewsController::class, 'index'])->name('news.index');
    Route::get('/{id}', [NewsController::class, 'show'])->name('news.show');
});

// 🔹 Quản lý nhân viên
Route::middleware(['auth'])->group(function () {
    Route::get('/employees', [EmployeeController::class, 'index'])->name('employees.index');

    Route::middleware(['admin_or_manager'])->group(function () {
        Route::get('/employees/create', [EmployeeController::class, 'create'])->name('employees.create');
        Route::post('/employees', [EmployeeController::class, 'store'])->name('employees.store');
        Route::get('/employees/{id}/edit', [EmployeeController::class, 'edit'])->name('employees.edit');
        Route::put('/employees/{id}', [EmployeeController::class, 'update'])->name('employees.update');
        Route::delete('/employees/{employee}', [EmployeeController::class, 'destroy'])->name('employees.destroy');
    });
});

// 🔹 Quản lý tài khoản (Chỉ Admin)
Route::middleware(['auth', 'admin'])->group(function () {
    Route::resource('users', UserController::class);
});

// 🔹 Quản lý ca làm, chức vụ, lương
Route::resource('positions', PositionController::class);
Route::resource('salaries', SalaryController::class);
Route::resource('shifts', ShiftController::class);
Route::resource('employee_shift', EmployeeShiftController::class);

// 🔹 Chấm công (Check-in & Check-out)
Route::post('/attendances/check-in', [AttendanceController::class, 'checkIn'])->name('attendances.checkin');
Route::post('/attendances/check-out', [AttendanceController::class, 'checkOut'])->name('attendances.checkout');

// 🔹 Giao diện xem danh sách
Route::get('/shifts', [ShiftController::class, 'index'])->name('shifts.index');
Route::get('/employee_shift', [EmployeeShiftController::class, 'index'])->name('employee_shift.index');
Route::get('/positions', [PositionController::class, 'index'])->name('positions.index');
Route::get('/salaries', [SalaryController::class, 'index'])->name('salaries.index');
Route::get('/users', [UserController::class, 'index'])->name('users.index');
Route::get('/attendance', [AttendanceController::class, 'index'])->name('attendance.index');

// 🔹 Dashboard (Chỉ đăng nhập mới vào được)
Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard')->middleware('auth');

// 🔹 Đăng nhập / Đăng xuất
Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login']);
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

// 🔹 Các trang tĩnh khác
Route::view('/careers', 'careers')->name('careers');
