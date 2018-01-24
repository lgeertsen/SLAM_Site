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
      factory(App\Tournament::class, 1)->create();
      factory(App\Participant::class, 20)->create();
    }
}
