<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class partner extends Model
{
    protected $table = 'partners';

    protected $primaryKey = 'id';

    public $timestamps = false;

    protected $fillable = [
        'nom',
        'abbr',
        'color',
        'logo',
        'url',
        'description',
        'ordre',
        'is_active',
    ];
}
