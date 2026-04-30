<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Projet;
use App\Models\Devise;
use App\Models\User;

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
    public function projet(){
        return $this->belongsTo('App\Models\Projet', 'projet_id');
    }
    public function devise(){
        return $this->belongsTo('App\Models\Devise', 'devise_id');
    }
    public function utilisateur(){
        return $this->belongsTo('App\Models\User', 'utilisateur_id');
    }

}
