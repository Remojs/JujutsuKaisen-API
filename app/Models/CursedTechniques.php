<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CursedTechniques extends Model
{
    protected $fillable = [
        'techniqueName',
        'type',
        'range',
        'capabilities'
    ];
}
