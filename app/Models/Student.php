<?php

namespace App\Models;

use App\Models\StudentClass;
use App\Models\AcademicScore;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticable;
use Illuminate\Notifications\Notifiable;

class Student extends Authenticable
{
    use Notifiable;

    protected $guard = 'student';
    protected $guarded = ['id'];
    protected $hidden = ['password'];

    public function studentClasses() {
        return $this->hasMany(StudentClass::class);
    }

    public function academicScores(){
        return $this->hasMany(AcademicScore::class);
    }
}
