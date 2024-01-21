<?php

use App\Http\Controllers\admin\BlogController;
use App\Http\Controllers\admin\CategoryController;
use App\Http\Controllers\admin\ClientController;
use App\Http\Controllers\admin\DashboardController;
use App\Http\Controllers\admin\ProjectController;
use App\Http\Controllers\admin\ServiceController;
use App\Http\Controllers\admin\SettingController;
use App\Http\Controllers\admin\TeamMemberController;
use App\Http\Controllers\admin\UsersController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return view('welcome');
});

// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth', 'verified'])->name('dashboard');

Route::get('/dashboard', [DashboardController::class, 'index'])->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::put('/profile', [ProfileController::class, 'avatar'])->name('profile.avatar');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::resource('/projects', ProjectController::class);
    Route::patch('/projects/{project}/status', [ProjectController::class, 'status'])->name('projects.status');
    Route::patch('/projects/{project}/testimonial', [ProjectController::class, 'testimonial'])->name('projects.testimonial');

    Route::resource('/services', ServiceController::class)->except('update');
    Route::put('/services/{service}', [ServiceController::class, 'update'])->name('service.update');

    Route::get('/settings', [SettingController::class, 'index']);

    Route::resource('/categories', CategoryController::class)->except('update');
    Route::put('/categories/{category}', [CategoryController::class, 'update'])->name('category.update');

    Route::resource('/blog', BlogController::class)->except(['update', 'destroy']);
    Route::put('/blog/{post}', [BlogController::class, 'update'])->name('blog.update');
    Route::delete('/blog/{post}', [BlogController::class, 'destroy'])->name('blog.destroy');

    Route::resource('/team', TeamMemberController::class);

    Route::resource('/clients', ClientController::class);

    Route::resource('/users', UsersController::class)->except(['show', 'update']);
    Route::put('/users/{user}', [UsersController::class, 'role'])->name('users.alterUser');
    Route::patch('/users/role', [UsersController::class, 'role'])->name('users.role');
});

require __DIR__.'/auth.php';
