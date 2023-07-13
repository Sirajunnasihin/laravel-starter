<?php

namespace App\Models;

use App\Models\Scopes\Searchable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    use HasFactory;
    use Searchable;

    protected $fillable = [
        'curriculum',
        'course_code',
        'course_name',
        'course_major',
        'course_semester',
        'course_instructor',
        'course_type',
        'course_conditional'
    ];

    public function curriculum()
    {
        return $this->belongsTo(Curriculum::class, 'curriculum');
    }

    public function course_instructor()
    {
        return $this->belongsTo(Lecture::class, 'course_instructor');
    }

    public function major()
    {
        return $this->belongsTo(Major::class, 'course_major');
    }

    public function conditional()
    {
        return $this->belongsTo(Conditional::class, 'after');
    }

    public function enrollments()
    {
        return $this->hasMany(Enrollment::class, 'course');
    }
}
