<?php

namespace Database\Seeders;

use App\Models\Service;
use Illuminate\Database\Seeder;

class ServiceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = \Faker\Factory::create();

        for ($i = 0; $i < 5; ++$i) {
            Service::create([
                'title' => $faker->realText(100),
                'logo' => 'no-image.jpg',
                'description' => $faker->paragraph(2),
                'sort' => $i + 1,
            ]);
        }
    }
}
