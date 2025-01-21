<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Affiliation extends Model
{

    use HasFactory;

    protected $fillable = [
        'affiliationName',
        'type',
        'location',
        'controlledBy'
    ];

    public function characters(): HasMany{
        return $this->hasMany(Character::class);
    } //una affilation tiene muchos characters
}
