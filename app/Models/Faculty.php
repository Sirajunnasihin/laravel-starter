<?php

namespace App\Models;

use App\Models\Scopes\Searchable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Faculty extends Model
{
    use HasFactory;
    use Searchable;

    protected $fillable = ['name', 'desc'];

    protected $searchableFields = ['*'];

    public function majors()
    {
        return $this->hasMany(Major::class);
    }
}
