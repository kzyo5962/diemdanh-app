<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SubjectSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $subjects = ['Toán', 'Lý', 'Hóa', 'Sinh', 'Anh', 'Văn', 'Sử', 'Địa'];
        foreach ($subjects as $subject) {
            DB::table("subjects")->insert([
                'name' => $subject,
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
