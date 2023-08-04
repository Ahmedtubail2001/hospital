<?php

namespace Database\Seeders;

use App\Models\Models\Section;
use App\Models\Section as ModelsSection;
use Illuminate\Database\Seeder;

class SectionTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        ModelsSection::factory()->count(5)->create();

    }
}