<?php

namespace App\Models;

use Illuminate\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Laravel\Sanctum\HasApiTokens;

class Explorer extends Model
{
    use HasFactory, HasApiTokens, MustVerifyEmail;
    protected $fillable = [
        'name',
        'age',
        'password',
        'email',
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }

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
