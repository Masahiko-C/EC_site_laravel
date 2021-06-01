<?php

use Faker\Generator as Faker;
use Carbon\Carbon;

$factory->define(App\Item::class, function (Faker $faker) {
    return [
        'name' => $faker->name(),
                'stock' => $faker->randomDigitNotNull(),
                'price' => $faker->randomDigitNotNull(),
                'image' => "1622550380.jpg",
                'status' => $faker->numberBetween(1,2),
                'created_at' => Carbon::today(),
    ];
});
