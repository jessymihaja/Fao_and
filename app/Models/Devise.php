<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Devise extends Model
{
    protected $table = 'devises';

    protected $primaryKey = 'id_devise';

    public $timestamps = false;

    protected $fillable = [
        'nom',
        'code',
        'symbol',
    ];
}
