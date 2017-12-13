<?php

use Faker\Generator as Faker;
use Carbon\Carbon;

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| This directory should contain each of the model factory definitions for
| your application. Factories provide a convenient way to generate new
| model instances for testing / seeding your application's database.
|
*/

$factory->define(App\Vote::class, function (Faker $faker) {
    return [
        'employee_id' =>$faker->numberBetween(1,20),
        'restaurant_id' => $faker->numberBetween(1,5),
        'date' => Carbon::parse($faker->randomElement(['last monday','next monday']))->toDateString(),
    ];
});


