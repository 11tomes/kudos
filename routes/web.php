<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\QuestionController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\ApplauseController;
use App\Http\Controllers\TeamController;

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

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return Inertia\Inertia::render('Dashboard');
})->name('dashboard');

Route::get('questions', [QuestionController::class, 'index'])->name('questions');
Route::post('questions', [QuestionController::class, 'store'])->name('questions.store');
Route::get('questions/{question}', [QuestionController::class, 'show'])->name('questions.show');
Route::post('questions/{question}/comments', [CommentController::class, 'store'])->name('questions.comments.store');

Route::post('comments/{comment}', [CommentController::class, 'resolve'])->name('comments.resolve');

Route::post('applauses/comments/{comment}', [ApplauseController::class, 'applauseComment'])->name('applauses.comments.store');
Route::post('applauses/questions/{question}', [ApplauseController::class, 'applauseQuestion'])->name('applauses.questions.store');

Route::put('teams/{team}/applause', [TeamController::class, 'resetApplause'])->name('teams.applause.update');
