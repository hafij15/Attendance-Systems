<?php

use Faker\Generator as Faker;

$factory->define(App\Admin::class, function (Faker $faker) {
    static $password;
	
    return [
        'admin_name' => $faker->name,
        'email_address' => $faker->unique()->safeEmail,
        'admin_password' => $password ?: $password = bcrypt('secret'),
        'access_label' => null
    ];
});
