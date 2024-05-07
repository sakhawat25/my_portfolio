<?php

namespace Database\Seeders;

use App\Models\Contact;
use Illuminate\Database\Seeder;

class ContactSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = \Faker\Factory::create();

        for ($i = 0; $i < 5; ++$i) {
            Contact::create([
                'name' => $faker->name(),
                'email' => $faker->email(),
                'subject' => $faker->realText(100),
                'message' => $faker->realText(200),
            ]);
        }
    }
}
