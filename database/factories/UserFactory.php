<?php

use Faker\Generator as Faker;

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

$factory->define(App\User::class, function (Faker $faker) {
    return [
        'name' => 'Arjun Chaudhary',
        'email' => 'test@gmail.com',
        'password' => Hash::make('test@121#'), // secret
        'ph_no' => '9814689424',
        'remember_token' => str_random(10),
    ];
});
