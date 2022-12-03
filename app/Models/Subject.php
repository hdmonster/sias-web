<?php

namespace App\Models;

use App\Models\SubjectTeacher;
use App\Models\AcademicScore;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Subject extends Model
{
    use HasFactory;

    public $timestamps = false;
    protected $guarded = ['id'];

    public function subjectTeachers(){
        return $this->hasMany(SubjectTeacher::class);
    }

    public function subjectScores(){
        return $this->hasMany(AcademicScore::class);
    }

    public function getSubjectNameAttribute($value){
        return ucfirst($value);
    }
}
