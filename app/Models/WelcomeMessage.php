<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class WelcomeMessage extends Model
{
    protected $table = 'welcome_messages';

    protected $primaryKey = 'id';

    public $timestamps = false;

    protected $fillable = [
        'is_active',
        'welcome_message',

    ];
}
