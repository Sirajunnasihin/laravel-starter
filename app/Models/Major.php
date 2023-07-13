<?php

namespace App\Models;

use App\Models\Scopes\Searchable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Major extends Model
{
    use HasFactory;
    use Searchable;
    use SoftDeletes;

    protected $fillable = ['faculty_id', 'name', 'desc'];

    protected $searchableFields = ['*'];

    public function faculty()
    {
        return $this->belongsTo(Faculty::class);
    }

    public function details()
    {
        return $this->hasMany(Detail::class, 'major');
    }
}
