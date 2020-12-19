<?php

namespace App\Http\Controllers;

use App\Models\Team;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Gate;

class TeamController extends Controller
{

    public function resetApplause(Request $request, Team $team)
    {
        $user = Auth::user();
        Gate::forUser($user)->authorize('resetTeamApplause', $team);

        $input = $request->all();
        Validator::make($input, [
            'applause' => ['required', 'integer', 'min:1'],
        ])->validateWithBag('restoreTeamGratitude');

        $applause = $input['applause'];

        // @todo improve
        foreach ($team->allUsers() as $user) {
            $gratitude = $user->gratitude;
            $gratitude->count = $applause;
            $gratitude->save();
        }

        return Redirect::route('dashboard');
    }

}
