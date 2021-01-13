<?php

namespace App\Http\Controllers\Admin;

use App\User;
use DB;
use Charts;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class DashboardController extends Controller
{
   public function registered()
   {
       $users = User::all();
       return view('admin.register')->with('users',$users);
   }

   public function dashboard()
   {
        return view('admin.dashboard');
   }

   public function dashboard1()
   {
        return view('admin.dashboard1');
   }
   
   public function dashboard2()
   {
     $user_info = DB::select("SELECT public.users_line.user_id, public.users_line.user_name, public.users_line.displayname, public.users_line.user_address, public.users_line.line_userid, public.users_line.time_update
     FROM public.users_line ");

     return view('admin.dashboard2',compact('user_info'));
   }
   
}
