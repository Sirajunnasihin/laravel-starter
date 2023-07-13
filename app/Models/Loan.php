<?php

namespace App\Models;

use App\Models\Scopes\Searchable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Loan extends Model
{
    use HasFactory;
    use Searchable;

    protected $fillable = [
        'date',
        'amount',
        'necessity',
        'borrower'
    ];

    public function reversions()
    {
        return $this->hasMany(Reversion::class, 'loan');
    }

    public function borrower()
    {
        return $this->belongsTo(Lecture::class, 'borrower');
    }
}
