<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Grade extends Model
{

    use HasFactory;

    protected $fillable = [
        'gradeLevel',
    ];

    public function characters(): HasMany{
        return $this->hasMany(Character::class);
    }//un grade tiene muchos characters en el mismo level
}
