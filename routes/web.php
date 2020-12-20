<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\QuestionController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\ApplauseController;
use App\Http\Controllers\TeamController;
use App\Http\Controllers\IdeaController;

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

Route::post('applauses/comments/{comment}', [ApplauseController::class, 'applaudComment'])->name('applauses.comments.store');
Route::post('applauses/questions/{question}', [ApplauseController::class, 'applaudQuestion'])->name('applauses.questions.store');
Route::post('applauses/ideas/{idea}', [ApplauseController::class, 'applaudIdea'])->name('applauses.ideas.store');

Route::put('teams/{team}/applause', [TeamController::class, 'resetApplause'])->name('teams.applause.update');

Route::get('ideas', [IdeaController::class, 'index'])->name('ideas');
Route::post('ideas', [IdeaController::class, 'store'])->name('ideas.store');
