<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class faqs extends Model
{
    protected $table = 'faqs';

    protected $primaryKey = 'id';

    public $timestamps = false;

    protected $fillable = [
        'question',
        'reponse',
        'categorie',
        'ordre',
        'is_active',
    ];
}
