<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\HonsformController;
use App\Http\Controllers\HscformController;
use App\Http\Controllers\OrganizationController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\SscformController;
use Illuminate\Support\Facades\Route;
use App\Http\Middleware\CheckUserRole;
use Illuminate\Support\Facades\Auth;

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

// Route::get('/', function () {
//     return view('welcome');
// });

// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::get('/', [HomeController::class, 'index'])
    ->name('home');
     

Route::get('/dashboard', [DashboardController::class, 'index'])
    ->name('dashboard')
    ->middleware('admin:'); 

   

    Route::middleware('admin')->group(function () {
        Route::resource('organization', OrganizationController::class);
        Route::resource('category', CategoryController::class);
        Route::resource('sscforms', SscformController::class);
        Route::resource('hscforms', HscformController::class);
        Route::resource('honsforms', HonsformController::class);
    });

    Route::get("/getForm/{id}",[HomeController::class, 'getForm']);
    Route::post("/formSubmit",[HomeController::class, 'formSubmit'])->name('formSubmit');
    Route::get("/authCheck",[HomeController::class, 'checkAuthentication']);
 







require __DIR__.'/auth.php';
