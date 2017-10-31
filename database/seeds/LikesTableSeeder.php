<?php

use Illuminate\Database\Seeder;

class LikesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $users = \App\Models\User::all();
        $posts = \App\Models\Post::all();

        foreach ($posts as $post)
        {
            $likes = $users->random(10)
                ->filter(
                    function ($id) use ($post)
                    {
                        return $id != $post;
                    });
            $post->likes()->sync($likes);
        }
    }
}
