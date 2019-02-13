<?php
use Faker\Generator as Faker;

$factory->define(App\tasks::class, function (Faker $faker) {
    return [
        'name' => $faker->text(50),
        'description' => $faker->text(20),
    ];
});

$factory->define(App\commands::class, function (Faker $faker) {
    return [
        'name' => $faker->text(50),
        'description' => $faker->text(20),
        'command' => $faker->sentence
    ];
});