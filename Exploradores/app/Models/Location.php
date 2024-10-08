<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Location extends Model
{
    use HasFactory;
    protected $fillable = [
        'latitude',
        'longitude',
        'explorer_id',
    ];

    public function explorer(){
        return $this->belongsTo(Explorer::class);
    }
}
