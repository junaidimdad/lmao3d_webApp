<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\User;
use App\Role;

class AdminController extends Controller
{
     /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function AdminDashboard(){
        return view('admin.adminDashboard');
    }
    public function changestatus($id){
         $user=User::find($id);
         
         $user->status_code=!$user->status_code;

         if($user->save()){
             return redirect(route('admin.viewHosts'));
         }else{
            return redirect(route('admin.changestatus'));
         }
    }
    public function ViewHosts(){
        $users=User::all();
        return view('admin.viewHosts')->with('users', $users);
    }
}
