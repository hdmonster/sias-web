<?php

namespace App\Models;

use App\Models\Student;
use App\Models\Subject;
use App\Models\AcademicClassYear;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class AcademicScore extends Model
{
    use HasFactory;

    public $timestamps = false;
    protected $guarded = ['id'];

    public function student(){
        return $this->belongsTo(Student::class);
    }

    public function subject(){
        return $this->belongsTo(Subject::class);
    }

    public function academicClassYear(){
        return $this->hasMany(AcademicClassYear::class);
    }
}
