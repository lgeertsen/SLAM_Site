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

$factory->define(App\Tournament::class, function (Faker $faker) {
  $sports = [ 'tennis', "pingpong", "volleyball", "basketball"];
  $key = array_rand($sports, 1);

  return [
    'sport' => $sports[$key],
    'date' => $faker->dateTimeBetween($startDate = 'now', $endDate = '+ 1 months'),
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
