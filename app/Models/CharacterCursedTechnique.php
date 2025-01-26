<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CharacterTechnique extends Model
{
    protected $table = 'character_cursed_technique';

    protected $fillable = [
        'character_id',
        'technique_id',
    ];

    public function character(){ return $this->belongsTo(Character::class);}
    public function cursedTechniques(){ return $this->belongsTo(CursedTechniques::class);}
}

