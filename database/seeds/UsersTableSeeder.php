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
        $user = \App\User::create([
            "name"=>"Michée",
            "email"=>"michee@gmail.com",
            "password"=>\Illuminate\Support\Facades\Hash::make("12345678")
        ]);

        $comment = \App\Comment::create([
           "content"=>"Hello world",
           "user_id"=>$user->id
        ]);
    }
}
