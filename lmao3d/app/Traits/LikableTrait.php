<?php


namespace App\Traits;


trait LikableTrait
{


    public function likeIt()
    {
        $like = new Like();
        $like->client_id = auth()->user()->id;

        $this->likes()->save($like);

        return $like;
    }

    public function likes()
    {
        return $this->morphMany('App\Client', 'likable');
    }

//     public function unlikeIt()
//     {
// //        $like = Like::find($id);
//         $this->likes()->where('client_id',auth()->id())->delete();

//     }

//     public function isLiked()
//     {
//         return !!$this->likes()->where('client_id',auth()->id())->count();
//     }

}