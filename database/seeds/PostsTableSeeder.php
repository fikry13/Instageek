<?php

use Illuminate\Database\Seeder;

class PostsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Storage::deleteDirectory('public\\posts');
        Storage::makeDirectory('public\\posts');

        $users = \App\Models\User::all();

        foreach ($users as $user)
        {
            if(!is_dir(storage_path('app\\public\\posts\\'.$user->id)))
                Storage::disk('public')->makeDirectory('posts\\'.$user->id);
            factory(App\Models\Post::class, 20)->create([
                'user_id' => $user->id,
                'photo' => 'storage\\posts\\'.$user->id.'\\'.\Faker\Factory::create()->image('public\\storage\\posts\\'.$user->id, 720, 720, null, false),
            ]);
        }

    }
}
