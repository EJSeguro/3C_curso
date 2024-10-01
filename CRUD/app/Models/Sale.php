<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Product;

class Sale extends Model
{
    use HasFactory;
    protected $fillable = [
        'human_id',
        'product_id'
    ];

    public function human(){
        return $this->belongsTo(Human::class);
    }

    public function product(){
        return $this->belongsTo(Product::class);
    }
}
