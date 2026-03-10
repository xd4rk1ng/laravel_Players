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
            'name' => 'dev',
            'email' => 'dev@test.com',
            'password' => Hash::make('password123'),
            'role_id' => '1'
        ]);
    }
}
