<?php

namespace App\Models;

use App\Models\Scopes\Searchable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Detail extends Model
{
    use HasFactory;
    use Searchable;

    protected $fillable = [
        'nik',
        'no_kk',
        'name',
        'place_of_birth',
        'date_of_birth',
        'gender',
        'religion',
        'province',
        'regency',
        'district',
        'village',
        'address',
        'phone_number',
        'email',
        'period',
        'faculty',
        'major'
    ];

    public function religion()
    {
        return $this->belongsTo(Religion::class, 'religion');
    }

    public function period()
    {
        return $this->belongsTo(Period::class, 'period');
    }

    public function faculty()
    {
        return $this->belongsTo(Faculty::class, 'faculty');
    }

    public function major()
    {
        return $this->belongsTo(Major::class, 'major');
    }
}
