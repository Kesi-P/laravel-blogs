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
        App\User::create([
          'name' => 'Kesi p',
          'email' => 'kesi.p@test.com',
          'password' => bcrypt('12345678')
        ]);
    }
}
