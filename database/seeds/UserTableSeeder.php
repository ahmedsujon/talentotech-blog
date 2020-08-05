<?php

use Illuminate\Database\Seeder;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        App\User::create([
             'name' => 'Sujon Ahmed',
             'email' => 'sujonahmed424@gmail.com',
             'password' => bcrypt('sujonahmed424')
        ]);
    }
}
