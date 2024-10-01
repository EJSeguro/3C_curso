<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Human;

class Animal extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'breed',
        'color',
        'gender',
        'human_id'
    ];

    public function human(){
        return $this->belongsTo(Human::class);
    }
}
