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
        'name' => $faker->name,
        'email' => $faker->unique()->safeEmail,
        'password' => '$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm', // secret
        'remember_token' => str_random(10),
    ];
});
$factory->define(App\Certificate::class, function (Faker $faker) {
    return [
        'code' => $faker->randomNumber(5, false),
        'expirationDate' => $faker->date('Y-m-d'),
        'pinCode' => $faker->randomNumber(4, false),
        'user_owner_id' => $faker->numberBetween(1,4),
        'user_activator_id' => $faker->numberBetween(1,4),
        'status_id' => $faker->numberBetween(1,5),
        'address_id' => $faker->numberBetween(1,3),
        'product_id' => $faker->numberBetween(1,6)
    ];
});

