<?php

namespace App\Models;

use App\Models\Scopes\Searchable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Religion extends Model
{
    use HasFactory;
    use Searchable;

    protected $fillable = [
        'name'
    ];

    public function details()
    {
        return $this->hasMany(Detail::class, 'religion');
    }
}
