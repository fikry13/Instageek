<?php

use Illuminate\Database\Seeder;

class FollowersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $users = \App\Models\User::all();

        foreach ($users as $user)
        {
            $followers = $users->random(10)
                ->filter(
                    function ($id) use ($user)
                    {
                        return $id != $user;
                    });
            $user->followers()->sync($followers);
        }
    }
}
