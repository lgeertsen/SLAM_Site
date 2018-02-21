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
      $sportsList = [
        [
          "name" => "tennis",
          "slug" => "tennis",
          "url" => "https://images.unsplash.com/photo-1485908953667-cf6d88997642?ixlib=rb-0.3.5&s=32b5c9feaa9744b23a6003e4e85c3657&auto=format&fit=crop&w=1440&q=80"
        ], [
          "name" => "ping pong",
          "slug" => "pingpong",
          "url" => "https://images.unsplash.com/photo-1518705577623-0ee01abc70a7?ixlib=rb-0.3.5&s=91e553cce650913b1d9a6e22ba7a1490&auto=format&fit=crop&w=1500&q=80"
        ], [
          "name" => "volleyball",
          "slug" => "volleyball",
          "url" => "https://images.unsplash.com/photo-1510006851064-e6056cd0e3a8?ixlib=rb-0.3.5&s=bd8a99ec606abdd781e0b5c91c6f5cb5&auto=format&fit=crop&w=1534&q=80"
        ], [
         "name" => "basketball",
         "slug" => "basketball",
         "url" => "https://images.unsplash.com/photo-1484482340112-e1e2682b4856?ixlib=rb-0.3.5&s=68a4bcadb531faea60b59c8694204604&auto=format&fit=crop&w=1510&q=80"
        ], [
          "name" => "rugby",
          "slug" => "rugby",
          "url" => "https://images.unsplash.com/photo-1450121982620-84a745035fa8?ixlib=rb-0.3.5&s=b2b7d02a223bb986b6449ff24a14ec97&auto=format&fit=crop&w=1436&q=80"
        ], [
          "name" => "football",
          "slug" => "football",
          "url" => "https://images.unsplash.com/photo-1490108474814-221f6198acc5?ixlib=rb-0.3.5&s=ab494d880357bb2b0c4beb326bd4e236&auto=format&fit=crop&w=1510&q=80"
        ], [
          "name" => "boxing",
          "slug" => "boxing",
          "url" => "https://images.unsplash.com/photo-1496979551903-46e46589a88b?ixlib=rb-0.3.5&s=821174d56e4265949f20330fc02b88b7&auto=format&fit=crop&w=1534&q=80"
        ], [
          "name" => "skateboard",
          "slug" => "skateboard",
          "url" => "https://images.unsplash.com/photo-1487051224065-0a68403c2450?ixlib=rb-0.3.5&s=c24859ba8872100d897276aae5135ea5&auto=format&fit=crop&w=750&q=80"
        ], [
          "name" => "running",
          "slug" => "running",
          "url" => "https://images.unsplash.com/photo-1474546652694-a33dd8161d66?ixlib=rb-0.3.5&s=b20933aaf7554aac1f26f949eded6582&auto=format&fit=crop&w=1524&q=80"
        ], [
          "name" => "golf",
          "slug" => "golf",
          "url" => "https://images.unsplash.com/photo-1470883086119-f9dda6fdb990?ixlib=rb-0.3.5&s=97fc9e953ed7168a9c9b0687a904fc7c&auto=format&fit=crop&w=1489&q=80"
        ], [
          "name" => "baseball",
          "slug" => "baseball",
          "url" => "https://images.unsplash.com/photo-1449356669056-f1c1e6e56b0f?ixlib=rb-0.3.5&s=adb01db70d56aa86873be75c5d2d3fa7&auto=format&fit=crop&w=1566&q=80"
        ], [
          "name" => "beer pong",
          "slug" => "beerpong",
          "url" => "https://static.wixstatic.com/media/5566ee_f0b1d2c912fc4c8ca87351bd3a032782~mv2_d_5184_3456_s_4_2.jpg"
        ]
      ];
      $sports = array();
      foreach ($sportsList as $item) {
        $sport = factory(App\Sport::class)->create([
          'name' => $item['name'],
          'slug' => $item['slug'],
          'url' => $item['url']
        ]);
        array_push($sports, $sport);
      }

      $tournaments = array();
      $words = ['awesome', 'epic', 'cool', 'great', 'the best', 'swag', 'boring', 'chill'];

      foreach($sports as $sport) {
        for ($i = 0; $i < 5; $i++) {
          // $key = array_rand($sports, 1);
          $word = array_rand($words, 1);
          $tournament = factory(App\Tournament::class)->create([
            'name' => $words[$word] . ' ' . $sport->name . ' tournament',
            'sport_id' => $sport,
          ]);
          array_push($tournaments, $tournament);
        }
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
