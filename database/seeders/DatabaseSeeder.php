<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash; // Import the Hash class

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();
        $user = new User();
        $user->password = Hash::make('1234');
        $user->email = 'admin@example.com';
        $user->name = 'Admin';
        $user->role = User::ROLE_ADMIN; // Add the role
        $user->save();

        $user = new User();
        $user->password = Hash::make('1234');
        $user->email = 'manager@example.com';
        $user->role = User::ROLE_MANAGER; // Add the role
        $user->name = 'Manager';
        $user->save();

        $user = new User();
        $user->password = Hash::make('1234');
        $user->email = 'user@example.com';
        $user->role = User::ROLE_USER; // Add the role
        $user->name = 'User';
        $user->save();

        $this->call(TeamsTableSeeder::class);
        $this->call(PlayersTableSeeder::class);
    }
}
