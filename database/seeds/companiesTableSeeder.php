<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;
class companiesTableSeeder extends Seeder
{
    public function run()
    {
        DB::table('companies')->truncate();
        $companies = [];
        $faker = Faker::create('hy_AM');
        foreach (range(1, 10) as $index) {
            $companies[] = [
                'name' => $faker->company,
                'website' => $faker->domainName,
                'email' => $faker->email,
                'address' => $faker->address,
                'created_at' => now(),
                'updated_at' => now()
            ];
        }
        DB::table('companies')->insert($companies);
    }
}
