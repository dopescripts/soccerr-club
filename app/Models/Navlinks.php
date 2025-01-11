<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Navlinks extends Model
{
    use HasFactory;
    protected $table = 'navlinks';
    protected $fillable = [
        'name',
        'link',
        'status',
    ];
    public function dropdownitems()
    {
        return $this->hasMany(Dropdownitem::class)->where('status', 'enabled');
    }
}
