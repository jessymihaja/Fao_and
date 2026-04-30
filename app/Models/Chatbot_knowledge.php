<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Chatbot_knowledge extends Model
{
    protected $table = 'chatbot_knowledges';
    protected $primaryKey = 'id';

    public $timestamps = false;

    protected $fillable = [
        'category',
        'keywords',
        'response',
        'is_active'

    ];
}
