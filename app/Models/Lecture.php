<?php

namespace App\Models;

use App\Models\Scopes\Searchable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Lecture extends Model
{
    use HasFactory;
    use Searchable;

    protected $fillable = [
        'nidn',
        'functional',
        'contract',
        'contract_date',
        'photo',
        'status'
    ];

    public function functional()
    {
        return $this->belongsTo(Functional::class, 'functional');
    }

    public function courses()
    {
        return $this->hasMany(Course::class, 'curriculum');
    }

    public function teach()
    {
        return $this->hasMany(Course::class, 'course_instructor');
    }

    public function loans()
    {
        return $this->hasMany(Loan::class, 'borrower');
    }
}
