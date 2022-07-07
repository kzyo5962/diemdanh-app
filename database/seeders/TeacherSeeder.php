<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TeacherSeeder extends Seeder
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
            DB::table("teachers")->insert([
                "fullName" => $faker->name(),
                "phoneNumber" => $faker->phoneNumber,
                'email' => $faker->unique()->email,
                "status" => $faker->randomElement(['Đang công tác', 'Đình chỉ', 'Vắng', 'Thôi việc']),
                "supervisor_id" => $faker->numberBetween(1, 10),
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
