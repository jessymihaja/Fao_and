<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Map extends Model
{
    protected $table = 'maps';

    protected $primaryKey = 'id_map';

    public $timestamps = false;

    protected $fillable = [
        'name',
        'lat',
        'lng',
        'budget',
        'projects',
        'status',
        'color',
        'sector',
    ];
}
