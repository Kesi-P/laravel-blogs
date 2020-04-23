<?php

use Illuminate\Database\Seeder;

class SettingsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        App\Setting::create([
          'site_name' => 'Laravels Blog',
          'contact_number'=>'0 123 456 789',
          'contact_email'=>'kesi@test_blog.com',
          'address' => 'Notthingham, UK',
        ]);
    }
}

    
