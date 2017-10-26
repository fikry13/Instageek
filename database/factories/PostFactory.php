<?php

use Faker\Generator as Faker;

$factory->define(App\Models\Post::class, function (Faker $faker) {
	$randomUserId = App\Models\User::pluck('id');

    return [
        'photo' => $faker->imageUrl(720,720),
        'caption' => $faker->sentence,
        'location' => $faker->city,
        'user_id' => $randomUserId->random(),
        'like_count' => $faker->randomNumber(3),
        'comment_count' => $faker->randomNumber(3),
    ];
});
