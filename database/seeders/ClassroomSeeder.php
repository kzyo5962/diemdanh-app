<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
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
        $limit = 20;
        $faker = \Faker\Factory::create();
        for ($i = 1; $i < $limit; $i++) {
            DB::table("classrooms")->insert([
                "name" => "Lớp học {$i}",
            ]);
        }
    }
}
