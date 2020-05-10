<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;

class UserSeeder extends Seeder
{
    public function run()
    {
        DB::table('user')->truncate();
        $user = [];
        $faker = Faker::create('hy_AM');
        foreach (range(1, 10) as $index) {
            $user[] = [
                'name' => $faker->userName,
                'email' => $faker->email,
                'role' => $faker->word,
                'password' => $faker->password,
                'created_at' => now(),
                'updated_at' => now()
            ];
        }
        DB::table('user')->insert($user);
    }
}
