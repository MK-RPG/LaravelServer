<?php

use Illuminate\Database\Seeder;
use App\User;
use Illuminate\Support\Facades\Hash;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = new User;
        $user->firstname = 'Jon';
        $user->lastname = 'Doe';
        $user->email = 'jon@doe.com';
        $user->password = Hash::make('password');
        $user->admin = 1;
        $user->save();
    }
}
