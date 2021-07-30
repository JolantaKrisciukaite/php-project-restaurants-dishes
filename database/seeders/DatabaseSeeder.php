<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Faker\Factory as Faker;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create('en_EN');

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

        $titles = ['Portofino', 'Dinner map', 'Bistro LaFa', 'Diverso', 'Mangal', 'Talutti', 'Kuhne', 'Dia', 'Spago', 'Indulge', 'Party Fowl', 'Rogo'];
        foreach(range(1, 20) as $_) {
            DB::table('menus')->insert([
                'title' => $titles[rand(0, count($titles) - 1)],
                'price' => rand(1, 10000),
                'weight' => rand(1, 500),
                'meat' => rand(1, 1000),
                'about' => $faker->realText(300, 5)
            ]);
        }
        
        $titles = ['Beef Stroganoff', 'Reuben', 'Sandwich', 'Waldorf Salad', 'French Fries', 'Chicken à la King', 'Lobster Newburg', 'Salisbury Steak', 'Carpaccio', 'Eggs Benedict', 'California Roll', 'Fettuccine Alfredo'];
        foreach(range(1, 20) as $_) {
            DB::table('restaurants')->insert([
                'title' => $titles[rand(0, count($titles) - 1)],
                'customers' => rand(1, 100),
                'employess' => rand(1, 100),
                'menu_id' => rand(1, 20),
            ]);
        }
    }
}
