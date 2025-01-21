<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Character extends Model
{

    use HasFactory;

    protected $fillable = [
        'name',
        'alias',
        'species',
        'birthday',
        'height',
        'weight',
        'age',
        'gender',
        'occupation_id',
        'affiliation_id',
        'animeDebut',
        'mangaDebut',
        'grade_id'
    ];

    public function affilation(): BelongsTo{ 
        return $this->belongsTo(Affiliation::class, 'affiliation_id');
    } //un character tiene una affilation

    public function occupation(): BelongsTo{ 
        return $this->belongsTo(Occupation::class, 'occupation_id');
    } //un character tiene una affilation

    public function grade(): BelongsTo{ 
        return $this->belongsTo(Grade::class, 'grade_id');
    } //un character tiene una affilation

    public function cursedTechniques()
    {
        return $this->belongsToMany(CursedTechnique::class, 'character_cursed_technique');
    }

}
