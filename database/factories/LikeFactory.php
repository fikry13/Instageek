<?php

use Faker\Generator as Faker;

$factory->define(App\Like::class, function (Faker $faker) {
	$randomUserId = App\Models\User::pluck('id');
	$randomPostId = App\Models\Post::pluck('id');
	while(alreadyLiked($randomPostId, $randomUserId))
    {
        $randomPostId = App\Models\Post::pluck('id');
    }

    return [
        'user_id' => $randomUserId->random(),
        'post_id' => $randomPostId->random(),
    ];
});


function alreadyLiked($postId, $userId)
{
    if(\App\Models\Post::id($postId)->likes->hasUser($userId))
        return true;
    else
        return false;
}