<?php

namespace Database\Seeders;

use App\Models\AcademicYear;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class AcademicYearSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $academic_years = array('2021/2022', '2022/2023');
        
        foreach ($academic_years as $academic_year){
          AcademicYear::create([
            'year' => $academic_year
          ]);
        }
    }
}
