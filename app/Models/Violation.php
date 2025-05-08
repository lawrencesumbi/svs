<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Violation extends Model
{
    use HasFactory;

    protected $fillable = [
        'student_id',
        'violation_name',
        'violation_description',
        'violation_severity_id',
        'violation_sanction',
        'violation_status_id',
    ];

    public function student()
    {
        return $this->belongsTo(Student::class);
    }

    public function violationSeverity()
    {
        return $this->belongsTo(ViolationSeverity::class);
    }

    public function violationStatus()
    {
        return $this->belongsTo(ViolationStatus::class);
    }
}
