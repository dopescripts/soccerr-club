<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class dropdownitem extends Model
{
    use HasFactory;
    public function dropdown(){
        return $this->belongsTo(Navlinks::class);
    }
}
