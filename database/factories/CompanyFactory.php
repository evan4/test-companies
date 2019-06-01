<?php

use Faker\Generator as Faker;

$factory->define(App\Company::class, function (Faker $faker) {

    $name = $faker->unique()->Company();
    $slug =  str_slug($name);

    return [
        'name' => $name,
        'slug' =>  $slug,
        'description' => $faker->text(300),
        'email' => $slug . '@gmail.com',
        'password' => bcrypt('secret'),
    ];
});
