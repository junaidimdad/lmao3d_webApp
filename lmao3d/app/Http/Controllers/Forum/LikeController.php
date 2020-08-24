<?php

namespace App\Http\Controllers\Forum;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Comment;

class LikeController extends Controller
{
     /**
     * Create a new controller instance.
     *
     * @return void
     */

    function __construct()
    {
        return $this->middleware('auth:client');
    }

    public function likeIt(Request $request){
        $commentId=$request->get('commentId');
        $comment=Comment::find($commentId);

        $comment->likeIt();

        return response()->json(['status'=>'success']);
    }

    // public function toggleLike(Request $request)
    // {
    //     $commentId=$request->get('commentId');
    //     $comment=Comment::find($commentId);
 
 //        $usersLike= $comment->likes()->where('user_id',auth()->id())->where('likable_id',$commentId)->first();
        //  if(!$comment->isLiked()){
        //      $comment->likeIt();
        //      return response()->json(['status'=>'success','message'=>'liked']);
 
        //  }else{
        //      $comment->unlikeIt();
        //      return response()->json(['status'=>'success','message'=>'unliked']);
 
        //  }
 
 
    //}
}
