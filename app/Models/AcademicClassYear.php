<?php

namespace App\Models;

use App\Models\AcademicClass;
use App\Models\AcademicScore;
use App\Models\SubjectTeacher;
use App\Models\ClassHomeTeacher;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class AcademicClassYear extends Model
{
    use HasFactory;

    public $timestamps = false; 
    protected $guarded = ['id'];

    public function academicClass(){
        return $this->belongsTo(AcademicClass::class);
    }

    public function academicYear(){
        return $this->belongsTo(AcademicYear::class);
    }
    
    public function academicScores(){
        return $this->hasMany(AcademicScore::class);
    }

    public function studentClasses(){
        return $this->hasMany(StudentClass::class);
    }

    public function homeroomTeachers(){
        return $this->hasMany(ClassHomeTeacher::class);
    }
    
}
