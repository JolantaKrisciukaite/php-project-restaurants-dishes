<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
// use Faker\Factory as Faker;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'name' => 'Jolanta',
            'email' => 'jkrisciukaite@gmail.com',
            'password' => Hash::make('123'),
        ]);

        DB::table('users')->insert([
            'name' => 'Raudona',
            'email' => 'raudona.zeme@gmail.com',
            'password' => Hash::make('123'),
        ]);

        foreach(range(1, 20) as $_) {
            DB::table('horses')->insert([
                'name' => $faker->firstname,
                'runs' => rand(1, 10000),
                'wins' => rand(1, 10000),
                'about' => $faker->realText(300, 5)
            ]);
        }
        
        foreach(range(1, 200) as $_) {
            DB::table('betters')->insert([
                'name' => $faker->firstname,
                'surname' => $faker->lastname,
                'bet' => rand(1, 50000),
                'horse_id' => rand(1, 20)
            ]);
        }
    }
}
