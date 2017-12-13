<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class RestaurantSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('restaurants')->insert([
                'name' => 'Pizza Hut',
                'cuisine' => 'pizza',
                'phone' => '(555) 123-4567',
                'menu_url' => 'https://www.pizzahut.com/index.php#?menu=pizza',
                'has_vegetarian' => 1,
                'has_spicy' => 0,
                'date_last_used' => Carbon::parse('Last Monday - 2 week')->toDateString()
            ]
        );

        DB::table('restaurants')->insert([
                'name' => 'Boston Market',
                'cuisine' => 'home cooked',
                'phone' => '(469) 080-9191',
                'menu_url' => 'https://www.bostonmarket.com/menu/',
                'has_vegetarian' => 1,
                'has_spicy' => 0,
                'date_last_used' => Carbon::parse('Last Monday - 3 week')->toDateString()

            ]
        );

        DB::table('restaurants')->insert([
                'name' => 'Jason\'s Deli',
                'cuisine' => 'sandwich',
                'phone' => '(456) 789-0123',
                'menu_url' => 'https://www.jasonsdeli.com/menu',
                'has_vegetarian' => 1,
                'has_spicy' => 0,
                'date_last_used' => Carbon::parse('Last Monday - 4 week')->toDateString()

            ]
        );

        DB::table('restaurants')->insert([
                'name' => 'Olive Garden',
                'cuisine' => 'italian',
                'phone' => '(214)789-6321',
                'menu_url' => 'http://www.olivegarden.com/menu- listing/pronto-lunch',
                'has_vegetarian' => 1,
                'has_spicy' => 1,
                'date_last_used' => Carbon::parse('Last Monday - 5 week')->toDateString()

            ]
        );

        DB::table('restaurants')->insert([
                'name' => 'Chick-fil-A',
                'cuisine' => 'chicken',
                'phone' => '(789) 654-1230',
                'menu_url' => 'https://www.chick-fil-a.com/#entrees',
                'has_vegetarian' => 0,
                'has_spicy' => 0,
                'date_last_used' => Carbon::parse('Last Monday - 6 week')->toDateString()
            ]
        );

    }
}
