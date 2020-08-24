<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\User;
use App\Admin;
use App\Role;
use App\Client;
use App\Thread;
use App\Tag;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::truncate();
        DB::table('admins')->truncate();
        DB::table('clients')->truncate();

        /**############################################################## */
        /** These are Related to Multi Role Functionality of LMAO 3D */
        //DB::table('role_user')->truncate(); 

        // $adminRole=Role::where('name','admin')->first();
        // $userRole=Role::where('name','user')->first();
        /**############################################################## */

        $admin=Admin::create([
            'name' => 'admin',
            'email' => 'admin@example.com',
            'password' => Hash::make('admin12345'),
            //'gender' => 'male',
        ]);
        $user=User::create([
            'name' => 'user',
            'email' => 'user@example.com',
            'password' => Hash::make('user12345'),
            'gender' => 'male',
         ]);
         // $client=Client::create([
         //    'name' => 'client',
         //    'email' => 'client@example.com',
         //    'password' => Hash::make('client12345'),
         //    //'gender' => 'male',
         // ]);
         $tag=Tag::create([
            'name' => 'Laravel',
         ]);
         $tag=Tag::create([
            'name' => 'PHP',
         ]);
         $tag=Tag::create([
            'name' => 'Node',
         ]);
         $tag=Tag::create([
            'name' => 'Kinect',
         ]);
         $tag=Tag::create([
            'name' => 'Javascript',
         ]);
         $tag=Tag::create([
            'name' => 'JQuery',
         ]);
         $tag=Tag::create([
            'name' => 'Ajax',
         ]);
         $tag=Tag::create([
            'name' => 'Others',
         ]);

        /**############################################################## */
        /** These are Related to Multi Role Functionality of LMAO 3D */
        // $admin->roles()->attach($adminRole);
        // $user->roles()->attach($userRole);
        /**############################################################## */
    }
}
