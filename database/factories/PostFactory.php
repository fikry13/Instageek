<?php

use Faker\Generator as Faker;

$factory->define(App\Models\Post::class, function (Faker $faker) {
    return [
        'photo' => $faker->sentence,
        'caption' => $faker->sentence,
        'location' => $faker->city,
        'user_id' => $faker->randomNumber(1),
        'like_count' => $faker->randomNumber(3),
        'comment_count' => $faker->randomNumber(3),
    ];
});
