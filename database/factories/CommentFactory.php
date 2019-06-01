<?php

use Faker\Generator as Faker;

$factory->define(App\Comment::class, function (Faker $faker) {
    return [
        'body' => $faker->text(300),
        'company_id' => factory('App\Company')->create()->id,
    ];
});
