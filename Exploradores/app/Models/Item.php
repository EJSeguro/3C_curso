<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    use HasFactory;
    protected $fillable = [
        'inventory_id',
        'name',
        'price',
        'latitude',
        'longitude',
    ];

    public function inventory() {
        return $this->belongsTo(Inventory::class);
    }

    public function explorer() {
        return $this->hasOneThrough(Explorer::class, Inventory::class);
    }
}
