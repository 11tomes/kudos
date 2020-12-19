<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use App\Events\ApplauseGiven;
use App\Models\Question;
use App\Models\Comment;

class ApplauseController extends Controller
{
    public function applauseComment(Comment $comment)
    {
        $user = Auth::user();
        $recipient = $comment->user;
        $count = 1;

        ApplauseGiven::dispatch($user, $recipient, $count);

        return Redirect::route('questions.show', $comment->question);
    }

    public function applauseQuestion(Question $question)
    {
        $user = Auth::user();
        $recipient = $question->user;
        $count = 1;

        ApplauseGiven::dispatch($user, $recipient, $count);

        return Redirect::route('questions.show', $question);
    }
}
