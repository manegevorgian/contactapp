<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run()
    {
          $this->call([
             CompaniesTableSeeder::class,
             ContactsTableSeeder::class
          ]);
    }
}
