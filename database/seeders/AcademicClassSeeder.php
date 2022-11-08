<?php

namespace Database\Seeders;

use App\Models\AcademicClass;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class AcademicClassSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {   
        $class_names = array('VII A', 'VII B', 'VIII A', 'VIII B', 'IX A', 'IX B');

        foreach ($class_names as $key => $class_name){
            AcademicClass::create([
                'class_name' => $class_name
            ]);
        }
    }
}
