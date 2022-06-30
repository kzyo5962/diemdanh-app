<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $limit = 10;
        $faker = \Faker\Factory::create();
        for ($i = 0; $i < $limit; $i++) {
            DB::table("admins")->insert([
                "fullName" => $faker->name(),
                "phoneNumber" => $faker->phoneNumber,
                'email' => $faker->unique()->email
            ]);
        }
    }
}
