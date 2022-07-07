<?php

namespace Database\Seeders;

use App\Models\Subject;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ClassroomSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $limit = 3;
        $subjects = Subject::all();

        foreach ($subjects as $subject) {
            for ($i = 1; $i <= $limit; $i++) {
                DB::table("classrooms")->insert([
                    'name' => 'Lớp ' . $subject->name . ' ' . $i,
                    'numOfLessons' => 15,
                    'subject_id' => $subject->id,
                    'created_at' => now(),
                    'updated_at' => now(),
                ]);
            }
        }
    }
}
