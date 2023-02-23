<?php

namespace Database\Seeders;

use App\Models\Student;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Schema;

class StudentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Schema::disableForeignKeyConstraints();
        // Student::truncate();
        // Schema::enableForeignKeyConstraints();

        // $data = [
        //     ['name' => 'Nasruddin', 'gende' => 'L', 'nis' => '0101001', 'class_id' => 1],
        //     ['name' => 'Nadila', 'gende' => 'P', 'nis' => '0101002', 'class_id' => 1],
        //     ['name' => 'Dev', 'gende' => 'L', 'nis' => '0101003', 'class_id' => 3],
        //     ['name' => 'Dila', 'gende' => 'P', 'nis' => '0101004', 'class_id' => 2],
        // ];

        // foreach ($data as $value) {
        //     Student::insert([
        //         'name' => $value['name'],
        //         'gende' => $value['gende'],
        //         'nis' => $value['nis'],
        //         'class_id' => $value['class_id'],
        //         'created_at' => Carbon::now(),
        //         'updated_at' => Carbon::now(),
        //     ]);
        // }

        Student::factory()->count(20)->create();
    }
}
