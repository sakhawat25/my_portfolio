<?php

namespace Database\Seeders;

use App\Models\Project;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class ProjectSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = \Faker\Factory::create();

        for ($i = 0; $i < 15; ++$i) {
            $title = $faker->sentence(4);
            $slug = Str::slug($title);

            $projectData = [
                'title' => $title,
                'slug' => $slug,
                'organization' => $faker->company(),
                'description' => $faker->text(200),
                'tags' => 'Web Development, Web Design, Backend Development',
                'image' => 'no-image.jpg',
                'start_date' => now(),
                'end_date' => now()->addDays(90),
                'category' => 'Inofrmatin Technology',
                'sort' => ++$i,
            ];

            Project::create($projectData);
        }
    }
}
