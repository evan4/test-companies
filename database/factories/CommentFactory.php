<?php

use Faker\Generator as Faker;

$factory->define(App\Comment::class, function (Faker $faker) {
    return [
        'body' => $faker->text(300),
        'author' => App\Company::pluck('id')->random(),
    ];
});
