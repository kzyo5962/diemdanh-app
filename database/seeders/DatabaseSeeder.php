<?php

namespace Database\Seeders;

use App\Models\Attendance;
use Illuminate\Database\Seeder;


class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call([
            RoleSeeder::class,
            UserSeeder::class,
            StudentSeeder::class,
            AdminSeeder::class,
            SupervisorSeeder::class,
            TeacherSeeder::class,
            SubjectSeeder::class,
            ClassroomSeeder::class,
            ScheduleSeeder::class,
            AttendanceSeeder::class,
        ]);
    }
}
