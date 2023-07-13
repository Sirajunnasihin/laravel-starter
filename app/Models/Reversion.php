<?php

namespace App\Models;

use App\Models\Scopes\Searchable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reversion extends Model
{
    use HasFactory;
    use Searchable;

    protected $fillable = [
        'loan',
        'date',
        'amount'
    ];

    public function loan()
    {
        return $this->belongsTo(Loan::class, 'loan');
    }
}
