<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Inertia\Inertia;

class DashboardController extends Controller
{
    public function index(Request $request)
    {
        //Insert process in getting badges
        $badges = [
            [
                "badge" => "helpful",
                "label" => "Answered 1 Question."
            ],
            [
                "badge" => "popular",
                "label" => "Answered 1 Question."
            ],
            [
                "badge" => "trusted",
                "label" => "Answered 1 Question."
            ],
            [
                "badge" => "curious",
                "label" => "Answered 1 Question."
            ],
        ];

        return Inertia::render('Dashboard', [
            'badges' => $badges,
        ]);
    }
}
