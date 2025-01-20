<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Character extends Model
{
    protected $table = 'character';

    protected $fillable = [
        'name',
        'alias',
        'species',
        'birthday',
        'age',
        'gender',
        'occupation',
        'affiliation',
    ];
}
