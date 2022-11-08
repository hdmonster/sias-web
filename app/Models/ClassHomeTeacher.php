<?php

namespace App\Models;

use App\Models\Teacher;
use App\Models\AcademicClassYear;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class ClassHomeTeacher extends Model
{
    use HasFactory;

    public $timestamps = false;
    protected $guarded = ['id'];

    public function academicClassYear(){
        return $this->belongsTo(AcademicClassYear::class);
    }

    public function teacher(){
        return $this->belongsTo(Teacher::class);
    }
}
