<?php

use Illuminate\Database\Seeder;

class CategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      DB::table('categories')->insert([
        'name' => 'Fast food'
      ]);
      DB::table('categories')->insert([
        'name' => 'Barbeque'
      ]);
      DB::table('categories')->insert([
        'name' => 'Fine Dining'
      ]);
      DB::table('categories')->insert([
        'name' => 'Ethnic'
      ]);
    }
}
