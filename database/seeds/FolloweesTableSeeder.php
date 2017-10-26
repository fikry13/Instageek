<?php

use Illuminate\Database\Seeder;

class FolloweesTableSeeder extends Seeder
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
            $followees = $users->random(10)
                ->filter(
                    function ($id) use ($user)
                    {
                        return $id != $user;
                    });
            $user->followees()->sync($followees);
        }
    }
}
