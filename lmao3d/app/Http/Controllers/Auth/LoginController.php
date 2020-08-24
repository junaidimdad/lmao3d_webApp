<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;


class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest', ['except' => ['logout', 'userlogout']]);
    }
    
    /**############################################################################# */
    /** This Function is Related to the Multi Role Functionality in LMAO 3D */

    // public function redirectTo(){
    //     if(Auth::user()->hasRoles('admin') && !Auth::user()->hasRoles('user')){
    //         return $this->redirectTo=route('admin.adminDashboard');
    //         //return $this->redirectTo;
    //     }else if(Auth::user()->hasRoles('user') && !Auth::user()->hasRoles('admin')){
    //         return $this->redirectTo=route('host.hostDashboard');
    //        // return $this->redirectTo;    
    //     }
    // }
    /**############################################################################# */

    protected function credentials(Request $request)
    {
        //return $request->only($this->username(), 'password');

        return ['email'=>$request->{$this->username()}, 'password'=>$request->password, 'status_code'=>'0'];
    }
    public function userlogout()
    {
        Auth::guard('web')->logout();
        return redirect('/');
    }
}
