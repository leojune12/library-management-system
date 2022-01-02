<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class StudentSubject extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $table = 'student_subject';

    protected $fillable = [
        "student_id",
        "subject_id",
    ];

    public function students()
    {
        return $this->belongsToMany(Student::class);
    }
}
