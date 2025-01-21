<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Occupation extends Model
{

    use HasFactory; 

    protected $fillable = [
        'occupationName',
        'status',
        'leader'
    ];

    public function characters(): HasMany{
        return $this->hasMany(Character::class);
    }//una occupation tiene muchos characters
}
