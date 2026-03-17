<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DomaineIntervention extends Model
{
    protected $table = 'domaine_interventions';

    protected $primaryKey = 'id_domaine_intervention';

    public $timestamps = false;

    protected $fillable = [
        'designation',
        'description',
    ];
}
