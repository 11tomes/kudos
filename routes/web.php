<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\QuestionController;
use App\Http\Controllers\CommentController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::middleware(['auth:sanctum', 'verified'])->group(function () {
    Route::get('dashboard', [DashboardController::class, 'index'])->name('dashboard');
});

Route::get('questions', [QuestionController::class, 'index'])->name('questions');
Route::post('questions', [QuestionController::class, 'store'])->name('questions.store');
Route::get('questions/{question}', [QuestionController::class, 'show'])->name('questions.show');
Route::post('questions/{question}/comments', [CommentController::class, 'store'])->name('questions.comments.store');
Route::post('comments/{comment}', [CommentController::class, 'resolve'])->name('comments.resolve');
// Route::resource('questions', QuestionController::class);
