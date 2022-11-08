<?php

namespace App\Models;

use App\Models\Student;
use App\Models\AcademicScore;
use App\Models\AcademicClassYear;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class StudentClass extends Model
{
    use HasFactory;

    public $timestamps = false;
    protected $guarded = ['id'];

    public function student(){
        return $this->belongsTo(Student::class);
    }

    public function academicClassYear(){
        return $this->belongsTo(AcademicClassYear::class);
    }

    public function studentScores(){
        return $this->hasMany(AcademicScore::class);
    }
}
