<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(){
      $tournaments = factory(App\Tournament::class, 5)->create();
      $tournaments->each(function($tournament) {
        // factory(App\Participant::class, 20)->create([
        //   'tournament_id' => $tournament->id
        // ]);
        $teams = factory(App\Team::class, 20)->create([
          'tournament_id' => $tournament->id,
          'size' => $tournament->teamSize
        ]);

        $teams->each(function($team) {
          factory(App\TeamMember::class, $team->size)->create([
            'team_id' => $team->id
          ]);
        });
      });
    }
}
