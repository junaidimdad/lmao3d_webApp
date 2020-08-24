<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Traits\LikableTrait;

class Comment extends Model
{
    use LikableTrait;


    protected $fillable = ['body'];


    public function commentable(){
        return $this->morphTo();
    }

    public function user(){
        return $this->belongsTo('App\Client');
    }

    public function comments(){
        return $this->morphMany('App\Comment', 'commentable')->latest();
    }
}
