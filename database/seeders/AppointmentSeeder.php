<?php

namespace Database\Seeders;

use App\Models\Appointment;
use Illuminate\Database\Seeder;

class AppointmentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Appointment::create(
            ['name_ar' => 'السبت', 'name_en' => 'Saturday']
        );

        Appointment::create(
            ['name_ar' => 'الأحد', 'name_en' => 'Sunday']
        );

        Appointment::create(
            ['name_ar' => 'الإثنين', 'name_en' => 'Monday']
        );

        Appointment::create(
            ['name_ar' => 'الثلاثاء', 'name_en' => 'Tuesday']
        );
        Appointment::create(
            ['name_ar' => 'الأربعاء', 'name_en' => 'Wednesday']

        );
        Appointment::create(
            ['name_ar' => 'الخميس', 'name_en' => 'Thursday']
        );
        Appointment::create(
            ['name_ar' => 'الجمعة', 'name_en' => 'Friday']
        );

    }
}
