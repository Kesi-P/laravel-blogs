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

          'avatar' => 'link to img',
          'user_id'=> $user->id,
          'about' => 'Boring one',
          'facebook'=> 'facebook.com',
          'instragram' => 'instragram.com'
        ]);
    }
}
