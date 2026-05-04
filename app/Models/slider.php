<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class slider extends Model
{
    protected $table = 'sliders';

    protected $primaryKey = 'id';

    public $timestamps = false;

    protected $fillable = [
        'titre',
        'sous_titre',
        'image',
        'cta_text',
        'cta_url',
        'ordre',
        'is_active',
    ];
}
