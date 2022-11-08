<?php

namespace App\Models;

use App\Models\AcademicClassYear;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class AcademicClass extends Model
{
    use HasFactory;
    
    public $timestamps = false; 
    protected $guarded = ['id'];

    public function academicClassYear(){
        return $this->hasMany(AcademicClassYear::class);
    }
}
