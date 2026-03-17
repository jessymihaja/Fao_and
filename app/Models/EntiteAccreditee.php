<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class EntiteAccreditee extends Model
{
    protected $table = 'entite_accreditees';

    protected $primaryKey = 'id_entite_accreditee';

    public $timestamps = false;

    protected $fillable = [
        'designation',
        'sigle',
    ];
}
