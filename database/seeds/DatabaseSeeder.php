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
      $sportsList = ["tennis", "pingpong", "volleyball", "basketball", "rugby", "football"];
      $sports = array();
      foreach ($sportsList as $sportItem) {
        $sport = factory(App\Sport::class)->create([
          'name' => $sportItem,
          'slug' => $sportItem,
        ]);
        array_push($sports, $sport);
      }

      $tournaments = array();
      $words = ['awesome', 'epic', 'cool', 'great', 'the best', 'swag', 'boring', 'chill'];

      for ($i = 0; $i < 5; $i++) {
        $key = array_rand($sports, 1);
        $word = array_rand($words, 1);
        $tournament = factory(App\Tournament::class)->create([
          'name' => $words[$word] . ' ' . $sports[$key]->name . ' tournament',
          'sport_id' => $sports[$key],
        ]);
        array_push($tournaments, $tournament);
      }

      foreach($tournaments as $tournament) {
        $teams = factory(App\Team::class, 20)->create([
          'tournament_id' => $tournament->id,
          'size' => $tournament->teamSize
        ]);

        $teams->each(function($team) {
          factory(App\TeamMember::class, $team->size)->create([
            'team_id' => $team->id
          ]);
        });
      };
    }
}
