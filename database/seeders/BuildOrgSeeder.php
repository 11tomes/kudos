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

        $users = User::factory()->count(10)->create();
        $users->each(function ($user) use ($owner) {
            DB::table('team_user')->insert([
                'user_id' => $user->id,
                'team_id' => $owner->team->id
            ]);
        });

/*         $teams = Team::factory->count(2)->create();
        $users = User::factory->count(30)->create();

        $users->each(function ($user) use ($teams) { 
            $user->teams()->attach(
                $teams->random(rand(1, 2))->pluck('id')->toArray()
            ); 
        }); */
    }
}
