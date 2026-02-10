<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\LikeController;
use App\Http\Controllers\BookmarkController;
use App\Http\Controllers\WriterApplicationController;
use App\Http\Controllers\NotificationController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\AuthorController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Http;

// Public Routes
Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/contact', [HomeController::class, 'contact'])->name('contact');
Route::get('/about', [HomeController::class, 'about'])->name('about');

// Auth Routes
Route::middleware('guest')->group(function () {
    Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
    Route::post('/login', [LoginController::class, 'login']);
    Route::get('/register', [RegisterController::class, 'showRegistrationForm'])->name('register');
    Route::post('/register', [RegisterController::class, 'register']);
    Route::post('/logout', [LoginController::class, 'logout'])->name('logout')->middleware('auth');
    Route::get('/author/{user:username}', [AuthorController::class, 'show'])->name('author.show');
});

// Posts Routes
Route::get('/posts', [PostController::class, 'index'])->name('posts.index');
Route::get('/post/{post:slug}', [PostController::class, 'show'])->name('posts.show');
Route::get('/category/{category:slug}', [PostController::class, 'byCategory'])->name('posts.category');
Route::get('/tag/{tag:slug}', [PostController::class, 'byTag'])->name('posts.tag');

// Authenticated Routes
Route::middleware('auth')->group(function () {
    // Profile Routes
    Route::get('/profile', [ProfileController::class, 'show'])->name('profile.show');
    Route::get('/profile/edit', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::put('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::put('/profile/password', [ProfileController::class, 'updatePassword'])->name('profile.password.update');
    Route::delete('/profile', [ProfileController::class, 'deleteAccount'])->name('profile.delete');

    // Comments Routes
    Route::post('/post/{post}/comment', [CommentController::class, 'store'])->name('comments.store');
    Route::delete('/comment/{comment}', [CommentController::class, 'destroy'])->name('comments.destroy');
    Route::put('/comments/{comment}', [CommentController::class, 'update']) ->name('comments.update');

    // Like Routes
    Route::post('/post/{post}/like', [LikeController::class, 'toggle'])->name('posts.like.toggle');

    // Bookmark Routes
    Route::post('/post/{post}/bookmark', [BookmarkController::class, 'toggle'])->name('posts.bookmark.toggle');
    Route::get('/bookmarks', [BookmarkController::class, 'index'])->name('bookmarks.index');

    // Writer Application Routes
    Route::get('/apply-writer', [WriterApplicationController::class, 'create'])->name('writer-applications.create');
    Route::post('/apply-writer', [WriterApplicationController::class, 'store'])->name('writer-applications.store');
    Route::get('/apply-writer/status', [WriterApplicationController::class, 'status'])->name('writer-applications.status');

    // Notification Routes
    Route::get('/notifications', [NotificationController::class, 'index'])->name('notifications.index');
    Route::post('/notifications/{notification}/read', [NotificationController::class, 'markAsRead'])->name('notifications.read');
    Route::post('/notifications/read-all', [NotificationController::class, 'markAllAsRead'])->name('notifications.read-all');
});

// Test Routes
Route::get('/test-milestone', function () {
    $url = env('N8N_WEBHOOK_POST_MILESTONE');

    // $data = [
    //     "author_id" => 9,
    //     "author_email" => "rovaalemi.es@gmail.com",
    //     "author_name" => "Alizon",
    //     "message" => "Tu post alcanzó 1000 vistas",
    //     "title" => "Mi primer post",
    //     "milestone_type" => "views",
    //     "milestone_value" => 1000,
    //     "url" => "https://techgap.com/post/mi-primer-post",
    //     "headers" => [
    //         "x-shared-token" => env("N8N_SHARED_TOKEN")
    //     ]
    // ];

    $data = [ "author_id" => 1, "author_email" => "rovaalemi.es@gmail.com", "author_name" => "Alizon", "message" => "Tu post alcanzó 1000 vistas", "title" => "Mi primer post", "milestone_type" => "views", "milestone_value" => 1000, "url" => "https://techgap.com/post/mi-primer-post" ];

    return Http::withHeaders([
        "x-shared-token" => env("N8N_SHARED_TOKEN")
    ])->post($url, $data)->json();
});

