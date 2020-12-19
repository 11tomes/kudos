<?php

namespace Database\Seeders;

use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Team;

class BuildOrgSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $owner = User::factory()->create([
            'name' => 'Owner',
            'email' => 'owner@klajd.com'
        ]);
        $org = Team::factory()->create(['user_id' => $owner->id]);

        $users = User::factory()->count(11)->create();

        $users->each(function ($user) use ($owner) {
            Team::factory()->create(['user_id' => $user->id]);
            DB::table('team_user')->insert([
                'user_id' => $user->id,
                'team_id' => $owner->personalTeam()->id
            ]);
        });

    }
}
