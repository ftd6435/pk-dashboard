<?php

use App\Http\Controllers\admin\BlogController;
use App\Http\Controllers\admin\CategoryController;
use App\Http\Controllers\admin\ClientController;
use App\Http\Controllers\admin\DashboardController;
use App\Http\Controllers\admin\ProjectController;
use App\Http\Controllers\admin\ServiceController;
use App\Http\Controllers\admin\SettingController;
use App\Http\Controllers\admin\UsersController;
use App\Http\Controllers\admin\TeamMemberController;
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

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/dashboard', [DashboardController::class, 'index']);

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

Route::get('/users', [UsersController::class, 'index']);