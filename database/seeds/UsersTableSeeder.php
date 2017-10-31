<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Storage::deleteDirectory('public\\avatars');
        Storage::makeDirectory('public\\avatars');
        factory(App\Models\User::class, 20)->create();

        $users = \App\Models\User::all();
        foreach ($users as $user)
        {
            $id = $user->id;
            if(!is_dir(storage_path('app\\public\\avatars\\'.$id)))
                Storage::disk('public')->makeDirectory('avatars\\'.$id);
            $user->profile_picture = 'storage\\avatars\\'.$id.'\\'.\Faker\Factory::create()->image('public\\storage\\avatars\\'.$id, 720, 720, 'people', false);
            $user->save();
        }
    }
}
