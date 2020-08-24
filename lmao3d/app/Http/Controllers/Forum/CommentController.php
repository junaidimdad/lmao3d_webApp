<?php

namespace App\Http\Controllers\Forum;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Notifications\RepliedToThread;
use App\Comment;
use App\Thread;
use App\Client;


class CommentController extends Controller
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

    public function addThreadComment(Request $request, Thread $thread)
    {
        $this->validate($request,[
            'body'=>'required'
        ]);

        $comment=new Comment();
        //dd($comment);
        $comment->body=$request->body;
        //dd($comment);
        $comment->client_id=auth()->user()->id;
        //dd($comment);
        $thread->comments()->save($comment);

        // $thread->addComment($request->body);
        auth()->user()->notify(new RepliedToThread($thread));
    
         //$thread->user->notify(new RepliedToThread($thread));

        return back()->withMessage('comment created');
    }

    public function addReplyComment(Request $request, Comment $comment)
    {
        $this->validate($request,[
            'body'=>'required'
        ]);

        $reply=new Comment();
        //dd($comment);
        $reply->body=$request->body;
        //dd($comment);
        $reply->client_id=auth()->user()->id;
        //dd($comment);
        $comment->comments()->save($reply);
        //$comment->addComment($request->body);

        return back()->withMessage('Reply created');
    }
    
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Comment $comment)
    {
        if($comment->client_id !== auth()->user()->id)
            abort('401');

        $this->validate($request,[
            'body'=>'required'
        ]);

        $comment->update($request->all());

        return back()->withMessage('updated');
    }

    

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Comment $comment)
    {
        if($comment->client_id !== auth()->user()->id)
            abort('401');

        $comment->delete();

        return back()->withMessage('Deleted');
    }
}
