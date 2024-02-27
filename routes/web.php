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
use App\Http\Controllers\CommentController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\HomePageController;
use App\Http\Controllers\ImageController;
use App\Http\Controllers\NewsletterController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ProjectCommentController;
use App\Http\Controllers\ServiceCommentController;
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

// Home and About pages routes
Route::get('/', [HomePageController::class, 'index'])->name('home');
Route::get('/home/about', [HomePageController::class, 'about'])->name('about');

// Blog posts routes 
Route::get('/home/blog', [HomePageController::class, 'blog'])->name('blog');
Route::get('/home/blog/{post}/details', [HomePageController::class, 'details'])->name('details');
Route::get('/home/blog/{category}/category', [HomePageController::class, 'showPerCategory'])->name('showPerCaegory');

// Blog posts comments route
Route::post('/home/blog/comments', [CommentController::class, 'store'])->name('comments.store');

// Testimonials page route
Route::get('/home/testimonials', [HomePageController::class, 'testimonial'])->name('testimonial');

// Projects articles route
Route::get('/home/project', [HomePageController::class, 'project'])->name('project');
Route::get('/home/{project}/project', [HomePageController::class, 'showProject'])->name('showProject');
Route::get('/home/project/status/{status}', [HomePageController::class, 'showPerStatus'])->name('showPerStatus');

// Projects articles comments route 
Route::post('/home/project/comments', [ProjectCommentController::class, 'store'])->name('project.comments.store');

// Service articles routes
Route::get('/home/service', [HomePageController::class, 'service'])->name('service');
Route::get('/home/service/{service}/details', [HomePageController::class, 'showService'])->name('showService');

// Projects articles comments route 
Route::post('/home/service/comments', [ServiceCommentController::class, 'store'])->name('service.comments.store');

// TeamMembers articles routes
Route::get('/home/team', [HomePageController::class, 'team'])->name('team');
Route::get('/home/team/{member}/member', [HomePageController::class, 'showMember'])->name('showMember');

// Contact routes
Route::get('/home/contact', [HomePageController::class, 'contact'])->name('contact');
Route::post('/home/contact/send', [ContactController::class, 'send'])->name('sendMessage');

// Newsletter routes
Route::get('/home/newsletters', [NewsletterController::class, 'index'])->name('newsletter.home');
Route::post('/home/newsletter', [NewsletterController::class, 'news'])->name('newsletter');
Route::get('/home/newsletter/{news}/unsubscribe', [NewsletterController::class, 'unsubscribe'])->name('newsletter.unsubscribe');
Route::delete('/home/newsletter/{news}', [NewsletterController::class, 'destroy'])->name('newsletter.destroy');


// Main Dashboard route
Route::get('/dashboard', [DashboardController::class, 'index'])->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::put('/profile', [ProfileController::class, 'avatar'])->name('profile.avatar');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::resource('/projects', ProjectController::class);
    Route::patch('/projects/{project}/status', [ProjectController::class, 'status'])->name('projects.status');
    Route::patch('/projects/{project}/testimonial', [ProjectController::class, 'testimonial'])->name('projects.testimonial');

    Route::get('/images/upload/{project}', [ImageController::class, 'uplaod'])->name('images.uplaod');
    Route::post('/images/store', [ImageController::class, 'store'])->name('images.store');
    Route::get('/images/edit/{project}', [ImageController::class, 'edit'])->name('images.edit');
    Route::put('/images/update/{project}', [ImageController::class, 'update'])->name('images.update');

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

Route::get('/errors/404', function(){
    return view('frontend.errors');
})->name('error.404');

require __DIR__.'/auth.php';
