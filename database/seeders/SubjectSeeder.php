<?php

namespace Database\Seeders;

use App\Models\Subject;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class SubjectSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $subjects = array('math', 'science', 'social', 'magic & spells');

        foreach ($subjects as $key => $subject){
            Subject::create([
                'subject_name' => $subject,
                'minimum_score' => 80
            ]);
        }
    }
}
