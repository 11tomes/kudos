<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Inertia\Inertia;
use Auth;

class DashboardController extends Controller
{
    public function index(Request $request)
    {
        $user = Auth::user();

        return Inertia::render('Dashboard', [
            'badges' => $user->getBadges(),
            'gratitude_count' => $user->getGratitudeCount(),
        ]);
    }
}
