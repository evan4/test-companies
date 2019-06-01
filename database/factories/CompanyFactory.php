<?php

use Faker\Generator as Faker;

$factory->define(App\Company::class, function (Faker $faker) {
    static $password;

    $name = $faker->Company();

    return [
        'name' => $name,
        'slug' => str_slug($name),
        'description' => $faker->text(300),
        'email' => $faker->unique()->companyEmail,
        'password' => $password ?: $password = bcrypt('secret'),
    ];
});
