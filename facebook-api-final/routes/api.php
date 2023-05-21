<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\LikeController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\UserController;
use App\Models\Comment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

// REGISTER USER 

Route::post('/register', [AuthController::class, 'register']);
Route::post('/login', [AuthController::class, 'login']);
Route::middleware(['auth:sanctum'])->group(function () {
    Route::post('/logout', [AuthController::class, 'logout']);
});


// USER ROUTE 
Route::prefix('users')->group(function () {

    // ROUTE GET ALL USERS 
    Route::get('/users', [UserController::class, 'index']);

    //ROTUE POST A USER
    Route::post('/users', [UserController::class, 'store']);

    // ROUTE GET A USER WITH ALL POSTS 
    Route::get('/user/{id}', [UserController::class, 'show']);
});

// POST ROUTE
Route::prefix('posts')->group(function () {

    // ROUTE GET ALL POSTS 
    Route::get('/posts', [PostController::class, 'index']);

    //ROTUE POST A POST
    Route::post('/posts', [PostController::class, 'store']);

    // ROUTE GET POST WITH LIKES AND COMMENTS 
    Route::get('post/{id}', [PostController::class, 'show']);
});

// COMMENTS ROUTE
Route::prefix('comments')->group(function () {

    // ROUTE GET ALL COMMENTS 
    Route::get('/comments', [CommentController::class, 'index']);

    //ROTUE POST A COMMENT
    Route::post('/comments', [CommentController::class, 'store']);
});


// LIKE ROUTE 
Route::prefix('likes')->group(function () {

    // ROUTE GET ALL LIKES 
    Route::get('/likes', [LikeController::class, 'index']);

    //ROTUE POST A LIKE
    Route::post('/likes', [LikeController::class, 'store']);
});
