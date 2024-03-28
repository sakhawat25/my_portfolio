<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class UsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create([
            'first_name' => 'Sakhawat',
            'last_name' => 'Hussain',
            'email' => 'sakhawathussainkaka@gmail.com',
            'image' => 'profile_pic.png',
            'password' => bcrypt('Alaska@55'),
            'cv_image' => 'no-image.jpg',
        ]);
    }
}
