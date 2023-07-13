<?php

namespace App\Models;

use App\Models\Scopes\Searchable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Enrollment extends Model
{
    use HasFactory;
    use Searchable;

    protected $fillable = [
        'student',
        'course',
        'period'
    ];

    public function student()
    {
        return $this->belongsTo(Student::class, 'student');
    }

    public function course()
    {
        return $this->belongsTo(Course::class, 'course');
    }

    public function period()
    {
        return $this->belongsTo(Period::class, 'period');
    }

    public function grades()
    {
        return $this->hasMany(Grade::class, 'enrollment');
    }
}
