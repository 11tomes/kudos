<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Inertia\Inertia;
use Auth;

class GratitudeController extends Controller
{
    public function show() {
        $user = Auth::user();

        return Inertia::render('RedeemGratitude', [
            'gratitude_count' => $user->getGratitudeCount(),
        ]);
    }

}
