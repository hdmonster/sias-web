<?php

namespace App\Models;

use App\Models\StudentClass;
use App\Models\AcademicScore;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Student extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public function studentClasses() {
        return $this->hasMany(StudentClass::class);
    }

    public function academicScores(){
        return $this->hasMany(AcademicScore::class);
    }
}
