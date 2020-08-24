<?php

namespace App\Http\Controllers\Forum;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Comment;
use App\Thread;
use App\Client;
use Image;
use Auth;

class UserProfileController extends Controller
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

    public function index(Client $user)
    {
       $threads=Thread::where('client_id',$user->id)->latest()->get();

       $comments=Comment::where('client_id',$user->id)->where('commentable_type','App\Thread')->get();

       return view('profile.index',compact('threads','comments','user'));  
    }
    public function PersonalProfile(){
        return view('profile.personalProfile', array('user' => Auth::user()));
    }
    public function Upload(Request $request){
        // Handle the user upload of avatar
        if($request->hasFile('avatar')){
            $avatar = $request->file('avatar');
            $filename = time() . '.' . $avatar->getClientOriginalExtension();
            Image::make($avatar)->resize(300, 300)->save( public_path('/clients/avatars/' . $filename ) );

            $user = Auth::user();
            $user->avatar = $filename;
        $user->save();
        }

        return redirect()->back()->with(array('user' => Auth::user()));
    }
}
