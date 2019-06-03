<?php

use Faker\Generator as Faker;

$factory->define(App\Employee::class, function (Faker $faker) {
    return [
        'name' => $faker->name,
        'salary' => $faker->numberBetween(1000, 9000),
        'position_id' => App\Position::pluck('id')->random(),
    ];
});
