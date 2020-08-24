<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ClientAdminSuggestion extends Model
{
    public $table = "ClientAdminSuggestion";
    protected $fillable = [
        'name', 'email', 'subject', 'suggestion', 
    ];
}
