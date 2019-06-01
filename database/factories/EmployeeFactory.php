<?php

use Faker\Generator as Faker;

$factory->define(App\Employee::class, function (Faker $faker) {
    return [
        'name' => $faker->name,
        'salary' => $faket->numberBetween(1000, 9000),
        'company_id' => factory('App\Company')->create()->id,
        'position_id' => factory('App\Position')->create()->id,
    ];
});
