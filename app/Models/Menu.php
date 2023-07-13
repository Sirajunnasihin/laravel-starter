<?php

namespace App\Models;

use App\Models\Scopes\Searchable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Menu extends Model
{
    use HasFactory;
    use Searchable;

    protected $fillable = [
        'group',
        'name',
        'slug',
        'icon',
        'menu_id',
        'order'
    ];

    public function subMenus()
    {
        return $this->hasMany(Menu::class);
    }
}
