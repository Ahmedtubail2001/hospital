<?php

namespace Database\Seeders;

use App\Models\Doctor as ModelsDoctor;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DoctorTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        ModelsDoctor::factory()->count(30)->create();
    }
}