<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use App\Models\Status;
use App\Models\Classification;
use App\Models\ZoneGeographique;
use App\Models\EntiteAccreditee;
use App\Models\DomaineIntervention;



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
    public function utilisateur() {
        return $this->belongsTo(User::class, 'id_utilisateur');
    }

    public function status() {
        return $this->belongsTo(Status::class, 'status_id');
    }

    public function classification() {
        return $this->belongsTo(Classification::class, 'classification_id');
    }

    public function zoneGeographique() {
        return $this->belongsTo(ZoneGeographique::class, 'zone_geographique_id');
    }

    public function entiteAccreditee() {
        return $this->belongsTo(EntiteAccreditee::class, 'entite_accreditee_id');
    }

    public function domaineIntervention() {
        return $this->belongsTo(DomaineIntervention::class, 'domaine_intervention_id');
    }

    public function updater() {
        return $this->belongsTo(User::class, 'id_utilisateur');
    }
}
