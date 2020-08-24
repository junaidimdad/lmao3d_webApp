<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Files extends Model
{
    protected $fillable = [
        'title', 'description', 'file',
    ];

    public function user(){
      return $this->belongsTo('App\User');
    }
}
