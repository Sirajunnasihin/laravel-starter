<?php

namespace App\Models;

use App\Models\Scopes\Searchable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Functional extends Model
{
    use HasFactory;
    use Searchable;

    protected $fillable = [
        'name'
    ];

    public function lectures()
    {
        return $this->hasMany(Lecture::class, 'functional');
    }
}
