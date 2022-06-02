<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class StudentSeeder extends Seeder
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
        for ($i = 0; $i < $limit; $i++) {
            DB::table("students")->insert([
                "fullName" => $faker->name(),
                "birthDt" => $faker->date($format = 'Y-m-d', $max = 'now'),
                'email' => $faker->unique()->email,
                "phoneNumber" => $faker->phoneNumber,
                "status" => $faker->randomElement(['Đang theo học', 'Đình chỉ', 'Thôi học']),
                "class_id" => $faker->numberBetween(1, 10)
            ]);
        }
    }
}
