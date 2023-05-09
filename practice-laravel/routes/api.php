<?php

use App\Http\Controllers\PeopleController;
use App\Http\Controllers\PostController;
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

// Family posts 
Route::prefix('postGroup')->group(function () {
    Route::get('/posts', [PostController::class, 'index'])->name('index');
    Route::get('/postsbut', [PostController::class, 'getPosts'])->name('getPosts');
    Route::get('/postsByDESC', [PostController::class, 'getPostsByDESC'])->name('getPostsByDESC');
    Route::get('/postsOrderBy', [PostController::class, 'getPostsOrderBy'])->name('getPostsOrderBy');
    Route::get('/count', [PostController::class, 'countPosts'])->name('countPosts');
    Route::get('/find/{id}', [PostController::class, 'store'])->name('store');
    Route::get('/price/{price}', [PostController::class, 'getPrice'])->name('getPrice');
    Route::get('/priceBetween', [PostController::class, 'getPriceBetween'])->name('getPriceBetween');
    Route::get('/priceGreaterThan', [PostController::class, 'getPriceGreaterThan'])->name('getPriceGreaterThan');
    Route::get('/priceLessThan', [PostController::class, 'getPriceLessThan'])->name('getPriceLessThan');
    Route::get('/biggest', [PostController::class, 'getBiggestPrice'])->name('getBiggestPrice');
    Route::get('/biggestPost', [PostController::class, 'getBiggestPost'])->name('getBiggestPost');
    Route::get('/notBetween', [PostController::class, 'getPriceNotBetween'])->name('getPriceNotBetween');
});

// Family People Route 
Route::prefix('people')->group(function () {
    Route::get('/person', [PeopleController::class, 'index']);
});
