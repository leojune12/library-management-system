<?php

namespace App\Models;

use App\Services\DropdownService;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Student extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable = [
        "id_number",
        "first_name",
        "middle_name",
        "last_name",
        "gender_id",
        "address",
        "academic_year_id",
        "semester_id",
        "year_level_id",
        "course_id",
    ];

    protected $appends = [
        'full_name',
        'gender_type'
    ];

    public function getFullNameAttribute()
    {
        $name_prefix = $this->name_prefix ? $this->name_prefix . ' ' : '';
        $first_name = $this->first_name ? $this->first_name . ' ' : '';
        $middle_name = $this->middle_name ? $this->middle_name . ' ' : '';
        $last_name = $this->last_name ? $this->last_name : '';
        $name_suffix = $this->name_suffix ? ' ' . $this->name_suffix : '';
        return $name_prefix . $first_name . $middle_name . $last_name . $name_suffix;
    }

    public function getGenderTypeAttribute()
    {
        return DropdownService::get_static('gender', $this->gender_id ?? '');
    }

    public function academicYear()
    {
        return $this->belongsTo(AcademicYear::class);
    }

    public function semester()
    {
        return $this->belongsTo(Semester::class);
    }

    public function yearLevel()
    {
        return $this->belongsTo(YearLevel::class);
    }

    public function course()
    {
        return $this->belongsTo(Course::class);
    }

    public function subjects()
    {
        return $this->belongsToMany(Subject::class)->withPivot('id')->wherePivotNull('deleted_at');
    }
}
