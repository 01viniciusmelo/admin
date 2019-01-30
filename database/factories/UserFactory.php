<?php

use App\User;
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

$factory->define(User::class, function (Faker $faker) {
    return [
        'name' => $faker->name,
        'email' => $faker->unique()->safeEmail,
        'role' => $faker->randomElement([
            
            User::ROLES[0],
            User::ROLES[1],
            User::ROLES[2]
        
        ]),
        'avatar' => $faker->imageUrl('200', '200'),
        'email_verified_at' => now(),
        'password' => bcrypt('password'), // secret
        'remember_token' => str_random(10),
    ];
});
