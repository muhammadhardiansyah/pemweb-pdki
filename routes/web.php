<?php
use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\EmailVerificationRequest;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\SigninController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\DashboardUserController;
use App\Http\Controllers\DashboardBrandController;
use App\Http\Controllers\DashboardAnnouncementController;
use App\Http\Controllers\DataPDKIController;
use App\Http\Controllers\HomeController;
use SebastianBergmann\CodeCoverage\Report\Html\Dashboard;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/
Auth::routes(['verify' => true]);

Route::get('/email/verify', function () {
    return view('auth.verify_email');
})->middleware('auth')->name('verification.notice');

// Rute untuk menangani verifikasi email setelah pengguna mengklik tautan
Route::get('/email/verify/{id}/{hash}', function (EmailVerificationRequest $request) {
    $request->fulfill();
    return redirect('/admin');
})->middleware(['auth', 'signed'])->name('verification.verify');


Route::post('/email/verification-notification', function (Request $request) {
    $request->user()->sendEmailVerificationNotification();

    return back()->with('message', 'Verification link sent!');
})->middleware(['auth', 'throttle:6,1'])->name('verification.send');

Route::get('/', function () {return view('home');})->middleware('guest');

Route::get('/login', [LoginController::class, 'index'])->name('login')->middleware('guest'); 
Route::post('/login', [LoginController::class, 'authenticate']); 
Route::post('/logout', [LoginController::class, 'logout']); 

Route::get('/signin', [SigninController::class, 'index'])->middleware('guest');
Route::post('/signin', [SigninController::class, 'store'])->middleware('guest');

Route::get('/admin', [DashboardController::class, 'index'])->middleware(['auth', 'verified']);

//User
Route::resource('/admin/users', DashboardUserController::class)->middleware(['auth','verified']);
Route::get('/admin/users/{id}/security', [DashboardUserController::class, 'security'])->middleware(['auth','verified']);
Route::post('/admin/users/changePassword', [DashboardUserController::class, 'changePassword']);

//Brand
Route::resource('/admin/brands', DashboardBrandController::class)->middleware(['auth','verified']);
Route::get('/admin/brands/accept/{brand:id}', [DashboardBrandController::class, 'accept']);
Route::post('/admin/brands/reject', [DashboardBrandController::class, 'reject']);
Route::post('/admin/brands/revise', [DashboardBrandController::class, 'revise']);
Route::get('/admin/brands/create/check', [DashboardBrandController::class, 'checkCreate']);
Route::get('/admin/brands/{id}/edit/check', [DashboardBrandController::class, 'checkEdit']);

// Auth::routes();

//Announcements
Route::resource('/admin/announcements', DashboardAnnouncementController::class)->middleware(['auth','verified']);




Route::get('/home', [HomeController::class, 'index'])->name('home');
Route::post('/home/search', [HomeController::class, 'search'])->name('search');
Route::get('/home/search/{id}', [HomeController::class, 'show'])->name('show');
