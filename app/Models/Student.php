<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    use HasFactory;

    protected $fillable = [
        'first_name',
        'last_name',
        'course_id',
        'year_level_id',
        'section_id',
        'address',
        'contact_number'
    ];  

    public function course(){
        return $this->belongsTo(Course::class);
    }

    public function yearLevel(){
        return $this->belongsTo(YearLevel::class);
    }

    public function section(){
        return $this->belongsTo(Section::class);
    }
}
