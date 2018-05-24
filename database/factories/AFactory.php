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

$factory->define(App\Admin::class, function (Faker $faker) {
	static $password;
	
    return [
        'admin_name' => $faker->name,
        'email_address' => $faker->unique()->safeEmail,
        'admin_password' => $password ?: $password = bcrypt('secret'),
        'access_label' => null
    ];
});
