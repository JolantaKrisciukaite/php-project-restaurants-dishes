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
        // $faker = Faker::create('en_EN');

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

        // foreach(range(1, 20) as $_) {
        //     DB::table('menus')->insert([
        //         'title' => $faker->firstname,
        //         'price' => rand(1, 10000),
        //         'weight' => rand(1, 10000),
        //         'weight' => rand(1, 10000),
        //         'about' => $faker->realText(300, 5)
        //     ]);
        // }
        
        // foreach(range(1, 200) as $_) {
        //     DB::table('restaurants')->insert([
        //         'name' => $faker->firstname,
        //         'surname' => $faker->lastname,
        //         'bet' => rand(1, 50000),
        //         'menu_id' => rand(1, 20)
        //     ]);
        // }
    }
}
