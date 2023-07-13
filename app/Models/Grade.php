<?php

namespace App\Models;

use App\Models\Scopes\Searchable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Grade extends Model
{
    use HasFactory;
    use Searchable;

    protected $fillable = [
        'enrollment',
        'student',
        'grade'
    ];

    public function enrollment()
    {
        return $this->belongsTo(Enrollment::class, 'enrollment');
    }

    public function student()
    {
        return $this->belongsTo(Student::class, 'student');
    }
}
