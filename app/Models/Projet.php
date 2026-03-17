<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Projet extends Model
{
    protected $table = 'projets';

    protected $primaryKey = 'id_projet';

    public $timestamps = false;

    protected $fillable = [
        'id_utilisateur',
        'nom',
        'date_debut',
        'date_fin',
        'description',
        'classification_id',
        'status_id',
        'zone_geographique_id',
        'entite_accreditee_id',
        'domaine_intervention_id',
        'id_utilisateur_updater',
    ];
}
