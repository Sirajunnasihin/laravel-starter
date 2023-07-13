<?php

namespace App\Models;

use App\Models\Scopes\Searchable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Conditional extends Model
{
    use HasFactory;
    use Searchable;

    protected $fillable = [
        'after',
        'before'
    ];

    public function after()
    {
        return $this->belongsTo(Course::class, 'after');
    }

    public function before()
    {
        return $this->belongsTo(Course::class, 'before');
    }
}
