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
        $user = App\User::create([
          'name' => 'Kesi p',
          'email' => 'kesi.p@test.com',
          'password' => bcrypt('12345678'),
          'admin' => 1,
        ]);


        App\Profile::create([
          'user_id'=> $user->id,
          'avatar' => 'link to img',
          'about' => 'Boring one',
          'facebook'=> 'facebook.com',
          'youtube' => 'youtube.com'
        ]);
    }
}
