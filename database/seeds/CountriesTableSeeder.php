<?php

use Illuminate\Database\Seeder;

class CountriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      DB::table('countries')->insert([
        'name' => 'Italy'
      ]);
      DB::table('countries')->insert([
        'name' => 'Greece'
      ]);
      DB::table('countries')->insert([
        'name' => 'Germany'
      ]);
      DB::table('countries')->insert([
        'name' => 'Spain'
      ]);
    }
}
