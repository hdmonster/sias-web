<?php

namespace App\Models;

use App\Models\AcademicClassYear;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class AcademicYear extends Model
{
    use HasFactory;

    public $timestamps = false;
    protected $guarded = ['id'];

    public function academicClassYears(){
        return $this->hasMany(AcademicClassYear::class);
    }
}
