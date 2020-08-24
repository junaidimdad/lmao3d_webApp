<?php

namespace App;

use Illuminate\Database\Eloquent\Model;


class Thread extends Model
{
  
     protected $guarded=[];
    
     protected $fillable = [
        'subject', 'thread',
     ];

     public function user(){
         return $this->belongsTo('App\Client');
     }

     public function comments(){
         return $this->morphMany('App\Comment', 'commentable')->latest();
     }

     public function tags()
    {
        return $this->belongsToMany('App\Tag','tag_thread');
    }
}
