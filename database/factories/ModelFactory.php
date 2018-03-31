<?php

use Faker\Generator as Faker;

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| This directory should contain each of the model factory definitions for
| your application. Factories provide a convenient way to generate new
| model instances for testing / seeding your application's database.
|
*/

$factory->define(App\User::class, function (Faker $faker) {
  return [
    'name' => $faker->name,
    'email' => $faker->unique()->safeEmail,
    'password' => '$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm',
    'remember_token' => str_random(10),
  ];
});


$factory->define(App\Sport::class, function (Faker $faker) {
  return [
    'name' => 'tennis',
    'slug' => 'tennis',
    'url' => '',
  ];
});

$factory->define(App\Tournament::class, function (Faker $faker) {
  // $sports = ["tennis", "pingpong", "volleyball", "basketball", "rugby", "football"];
  // $key = array_rand($sports, 1);

  return [
    'name' => $faker->word . ' tournament',
    // 'sport_id' => $sports[$key],
    'date' => $faker->dateTimeBetween($startDate = 'now', $endDate = '+ 1 months'),
    // 'teamSize' => $faker->randomDigitNotNull,
    'description' => $faker->paragraph($nbSentences = 10, $variableNbSentences = true),
  ];
});

$factory->define(App\Participant::class, function (Faker $faker) {
  return [
    'user_id' => function() {
      return factory('App\User')->create()->id;
    },
    'tournament_id' => function() {
      return 1;
    },
  ];
});

$factory->define(App\Team::class, function (Faker $faker) {
  return [
    'name' => $faker->catchPhrase,
    'tournament_id' => 1,
    'size' => 2
  ];
});

$factory->define(App\TeamMember::class, function (Faker $faker) {
  return [
    'user_id' => function() {
      return factory('App\User')->create()->id;
    },
    'team_id' => 1
  ];
});
