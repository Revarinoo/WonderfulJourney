<?php

use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'name' => 'Admin',
            'email' => 'admin@wonderfuljourney.com',
            'phone'=>'082123456789',
            'role'=>'Admin',
            'password' => Hash::make('admin123')
        ]);
        DB::table('users')->insert([
            'name' => 'User 1',
            'email' => 'user1@gmail.com',
            'phone'=>'082123412349',
            'role'=>'User',
            'password' => Hash::make('user123')
        ]);
    }
}
