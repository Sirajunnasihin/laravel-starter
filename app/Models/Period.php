<?php

namespace App\Models;

use App\Models\Scopes\Searchable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Period extends Model
{
    use HasFactory;
    use Searchable;

    protected $fillable = [
        'code',
        'semester',
        'name',
        'status'
    ];

    public function details()
    {
        return $this->hasMany(Detail::class, 'period');
    }

    public function enrollments()
    {
        return $this->hasMany(Enrollment::class, 'period');
    }

    public function students()
    {
        return $this->hasMany(Student::class, 'period');
    }
}
