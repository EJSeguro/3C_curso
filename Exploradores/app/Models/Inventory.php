<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Inventory extends Model
{
    use HasFactory;
    protected $fillable = [
        'explorer_id',
    ];

    public function explorer(){
        return $this->belongsTo(Explorer::class);
    }

    public function item(){
        return $this->hasMany(Item::class);
    }
}
