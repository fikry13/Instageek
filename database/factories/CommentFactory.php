<?php

use Faker\Generator as Faker;

$factory->define(App\Comment::class, function (Faker $faker) {
	$randomUserId = App\Models\User::pluck('id');
	$randomPostId = App\Models\Post::pluck('id');

    return [
        'comment' => $faker->text,
        'user_id' => $randomUserId->random(),
        'post_id' => $randomPostId->random(),
    ];
});
