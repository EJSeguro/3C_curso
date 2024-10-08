<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Explorer extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'age',
    ];

    public function inventory(){
        return $this->hasOne(Inventory::class);
    }

    public function locations(){
        return $this->hasMany(Location::class);
    }

    public function location(){
        return $this->locations()->latest()->first();
    }
}
