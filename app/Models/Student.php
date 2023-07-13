<?php

namespace App\Models;

use App\Models\Scopes\Searchable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    use HasFactory;
    use Searchable;

    protected $fillable = [
        'nim',
        'classroom',
        'status',
        'guide',
        'new',
        'in_period'
    ];

    public function classroom()
    {
        return $this->belongsTo(Classroom::class, 'classroom');
    }

    public function in_period()
    {
        return $this->belongsTo(Period::class, 'in_period');
    }

    public function enrollments()
    {
        return $this->hasMany(Enrollment::class, 'student');
    }

    public function grades()
    {
        return $this->hasMany(Grade::class, 'student');
    }
}
