<?php

namespace App\Models;

use App\Models\AcademicClassYear;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class SubjectTeacher extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public function academicClassYear(){
        return $this->belongsTo(AcademicClassYear::class);
    }
}
