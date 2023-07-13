<?php

namespace App\Models;

use App\Models\Scopes\Searchable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Curriculum extends Model
{
    use HasFactory;
    use Searchable;

    protected $fillable = [
        'name',
        'year',
        'desc'
    ];

    public function courses()
    {
        return $this->hasMany(Course::class, 'curriculum');
    }
}
