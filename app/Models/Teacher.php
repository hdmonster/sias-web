<?php

namespace App\Models;

use App\Models\SubjectTeacher;
use App\Models\ClassHomeTeacher;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Teacher extends Model
{
    use HasFactory;
    
    protected $guarded = ['id'];

    public function subjectTeacher(){
        return $this->hasMany(SubjectTeacher::class);
    }

    public function homeroom(){
        return $this->hasMany(ClassHomeTeacher::class);
    }
}
