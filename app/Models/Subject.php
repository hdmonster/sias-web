<?php

namespace App\Models;

use App\Models\SubjectTeacher;
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
}
