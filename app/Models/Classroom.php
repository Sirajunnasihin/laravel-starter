<?php

namespace App\Models;

use App\Models\Scopes\Searchable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Classroom extends Model
{
    use HasFactory;
    use Searchable;

    protected $fillable = [
        'name',
        'desc'
    ];

    protected $searchableFields = ['*'];

    public function students()
    {
        return $this->hasMany(Student::class, 'classroom');
    }
}
