<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\Student2Controller;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\AdminAuthController;
use App\Http\Controllers\BloodDonorController;
use App\Http\Controllers\BloodRequestController;
use App\Http\Controllers\ContactInfoController;
use App\Http\Controllers\ContactQueryController;
use App\Http\Controllers\RequirerController;
use App\Http\Controllers\PageController;

/*
|--------------------------------------------------------------------------
| Misc / Legacy Routes
|--------------------------------------------------------------------------
*/
Route::resource('student', StudentController::class);
Route::post('/student/result', [StudentController::class, 'show'])->name('student.result');

/*
|--------------------------------------------------------------------------
| Students (students/ folder views — Student2Controller)
|--------------------------------------------------------------------------
*/
Route::get('/students',                   [Student2Controller::class, 'index'])->name('students.index');
Route::get('/students/create',            [Student2Controller::class, 'create'])->name('students.create');
Route::post('/students',                  [Student2Controller::class, 'store'])->name('students.store');
Route::get('/students/{student}/edit',    [Student2Controller::class, 'edit'])->name('students.edit');
Route::put('/students/{student}',         [Student2Controller::class, 'update'])->name('students.update');
Route::get('/students/{student}/delete',  [Student2Controller::class, 'delete'])->name('students.delete');
Route::delete('/students/{student}',      [Student2Controller::class, 'destroy'])->name('students.destroy');

/*
|--------------------------------------------------------------------------
| Home (public)
|--------------------------------------------------------------------------
*/
Route::view('/', 'home')->name('home');

/*
|--------------------------------------------------------------------------
| Admin Authentication (no middleware - these are the login pages)
|--------------------------------------------------------------------------
*/
Route::get('/admin/login',  [AdminAuthController::class, 'showLoginForm'])->name('admin.login');
Route::post('/admin/login', [AdminAuthController::class, 'login'])->name('admin.login.post');
Route::post('/admin/logout',[AdminAuthController::class, 'logout'])->name('admin.logout');
Route::redirect('/login', '/admin/login');

/*
|--------------------------------------------------------------------------
| Public Blood System Routes (anyone can view & submit requests / register)
|--------------------------------------------------------------------------
*/

// Blood Donors - public read + create; edit/delete locked to admin below
Route::get('/blood-donors',        [BloodDonorController::class, 'index'])->name('blood-donors.index');
Route::get('/blood-donors/create', [BloodDonorController::class, 'create'])->name('blood-donors.create');
Route::post('/blood-donors',       [BloodDonorController::class, 'store'])->name('blood-donors.store');

// Blood Requests - public read + create
Route::get('/blood-request',        [BloodRequestController::class, 'index'])->name('blood-request.index');
Route::get('/blood-request/create', [BloodRequestController::class, 'create'])->name('blood-request.create');
Route::post('/blood-request',       [BloodRequestController::class, 'store'])->name('blood-request.store');

// Contact Info - public read + create
Route::get('/contact-info',        [ContactInfoController::class, 'index'])->name('contact-info.index');
Route::get('/contact-info/create', [ContactInfoController::class, 'create'])->name('contact-info.create');
Route::post('/contact-info',       [ContactInfoController::class, 'store'])->name('contact-info.store');

// Contact Queries - public read + submit
Route::get('/contact-queries',        [ContactQueryController::class, 'index'])->name('contact-queries.index');
Route::get('/contact-queries/create', [ContactQueryController::class, 'create'])->name('contact-queries.create');
Route::post('/contact-queries',       [ContactQueryController::class, 'store'])->name('contact-queries.store');

// Pages - public read + create
Route::get('/pages',        [PageController::class, 'index'])->name('pages.index');
Route::get('/pages/create', [PageController::class, 'create'])->name('pages.create');
Route::post('/pages',       [PageController::class, 'store'])->name('pages.store');
Route::get('/page',         [PageController::class, 'index'])->name('page.index');
Route::get('/page/create',  [PageController::class, 'create'])->name('page.create');

/*
|--------------------------------------------------------------------------
| Admin Dashboard & Management (admin role required)
|--------------------------------------------------------------------------
*/
Route::middleware(['admin'])->group(function () {

    // Admin user management (CRUD)
    Route::get('/admin',        [AdminController::class, 'index'])->name('admin.index');
    Route::get('/admin/create', [AdminController::class, 'create'])->name('admin.create');
    Route::post('/admin',       [AdminController::class, 'store'])->name('admin.store');

    // Blood Donors - edit / update / delete
    Route::get('/blood-donors/{bloodDonor}/edit',  [BloodDonorController::class, 'edit'])->name('blood-donors.edit');
    Route::put('/blood-donors/{bloodDonor}',       [BloodDonorController::class, 'update'])->name('blood-donors.update');
    Route::delete('/blood-donors/{bloodDonor}',    [BloodDonorController::class, 'destroy'])->name('blood-donors.destroy');

    // Blood Requests - edit / update / delete (blood.request middleware stacked on top)
    Route::middleware(['blood.request'])->group(function () {
        Route::get('/blood-request/{bloodRequest}/edit', [BloodRequestController::class, 'edit'])->name('blood-request.edit');
        Route::put('/blood-request/{bloodRequest}',      [BloodRequestController::class, 'update'])->name('blood-request.update');
        Route::delete('/blood-request/{bloodRequest}',   [BloodRequestController::class, 'destroy'])->name('blood-request.destroy');
    });

    // Requirers - full CRUD (blood.request middleware)
    Route::middleware(['blood.request'])->group(function () {
        Route::get('/requirers',                 [RequirerController::class, 'index'])->name('requirers.index');
        Route::get('/requirers/create',          [RequirerController::class, 'create'])->name('requirers.create');
        Route::post('/requirers',                [RequirerController::class, 'store'])->name('requirers.store');
        Route::get('/requirers/{requirer}/edit', [RequirerController::class, 'edit'])->name('requirers.edit');
        Route::put('/requirers/{requirer}',      [RequirerController::class, 'update'])->name('requirers.update');
        Route::delete('/requirers/{requirer}',   [RequirerController::class, 'destroy'])->name('requirers.destroy');
    });

    // Contact Info - edit / update / delete
    Route::get('/contact-info/{contactInfo}/edit', [ContactInfoController::class, 'edit'])->name('contact-info.edit');
    Route::put('/contact-info/{contactInfo}',      [ContactInfoController::class, 'update'])->name('contact-info.update');
    Route::delete('/contact-info/{contactInfo}',   [ContactInfoController::class, 'destroy'])->name('contact-info.destroy');

    // Contact Queries - edit (status) / delete
    Route::get('/contact-queries/{contactQuery}/edit', [ContactQueryController::class, 'edit'])->name('contact-queries.edit');
    Route::put('/contact-queries/{contactQuery}',      [ContactQueryController::class, 'update'])->name('contact-queries.update');
    Route::delete('/contact-queries/{contactQuery}',   [ContactQueryController::class, 'destroy'])->name('contact-queries.destroy');

    // Pages - edit / update / delete
    Route::get('/pages/{page}/edit', [PageController::class, 'edit'])->name('pages.edit');
    Route::put('/pages/{page}',      [PageController::class, 'update'])->name('pages.update');
    Route::delete('/pages/{page}',   [PageController::class, 'destroy'])->name('pages.destroy');
});

/*
|--------------------------------------------------------------------------
| Portfolio Routes (Dwen-D)
|--------------------------------------------------------------------------
*/
Route::view('/portfolio', 'app')->name('portfolio.home');
Route::get('/work',         fn () => view('app'))->name('work');
Route::get('/expertise',    fn () => view('app'))->name('expertise');
Route::get('/testimonials', fn () => view('app'))->name('testimonials');
Route::get('/contact',      fn () => view('app'))->name('contact');
Route::view('/aboutme', 'aboutme')->name('aboutme');

/*
|--------------------------------------------------------------------------
| Framework Auth (Inertia dashboard etc.)
|--------------------------------------------------------------------------
*/
Route::middleware(['auth', 'verified'])->group(function () {
    Route::inertia('dashboard', 'dashboard')->name('dashboard');
});

require __DIR__.'/settings.php';
