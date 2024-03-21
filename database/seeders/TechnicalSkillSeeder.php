<?php

namespace Database\Seeders;

use App\Models\TechnicalSkill;
use Illuminate\Database\Seeder;

class TechnicalSkillSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $technicalSkills = [
            [
                'name' => 'PHP',
                'level' => 50,
            ],

            [
                'name' => 'Laravel',
                'level' => 70,
            ],

            [
                'name' => 'JS',
                'level' => 40,
            ],
        ];

        foreach ($technicalSkills as $technicalSkill) {
            TechnicalSkill::create($technicalSkill);
        }
    }
}
