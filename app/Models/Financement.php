<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Financement extends Model
{
    protected $table = 'financements';

    protected $primaryKey = 'id_financement';

    public $timestamps = false;

    protected $fillable = [
        'id_financement',
        'projet_id',
        'financeur',
        'montant',
        'devise_id',
        'montant_MGA',
        'date_financement',
        'utilisateur_id',
        'id_utilisateur_updater',

    ];
}
