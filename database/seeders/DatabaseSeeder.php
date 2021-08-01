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

        $titles = ['Beef Stroganoff', 'Reuben', 'Lamb Shank', 'Waldorf Salad', 'French Fries', 'Chicken à la King', 'Lobster Newburg', 'Salisbury Steak', 'Carpaccio', 'Eggs Benedict', 'California Roll', 'Fettuccine Alfredo'];
        foreach(range(1, 20) as $_) {
            DB::table('menus')->insert([
                'title' => $titles[rand(0, count($titles) - 1)],
                'price' => rand(1, 100),
                'weight' => rand(300, 500),
                'meat' => rand(0, 200),
                'about' => $faker->realText(300, 5),
                'photo' =>  rand(0, 2) ? $faker->imageUrl(200, 200) : null, // nuotrauku idejimas
            ]);
        }
        
        $titles = ['Portofino', 'Dinner map', 'Bistro LaFa', 'Diverso', 'Mangal', 'Talutti', 'Kuhne', 'Dia', 'Spago', 'Indulge', 'Party Fowl', 'Rogo'];
        foreach(range(1, 200) as $_) {
            DB::table('restaurants')->insert([
                'title' => $titles[rand(0, count($titles) - 1)],
                'customers' => rand(1, 100),
                'employess' => rand(1, 100),
                'menu_id' => rand(1, 20),
            ]);
        }
    }
}
