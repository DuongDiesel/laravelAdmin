<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use DB;
use Charts;
use App\Http\Controllers\Controller;

class Dashboard2report extends Controller
{
    

    public function test($time){
        print_r($time);
        info($time);
        $time_1=$time;
        $time_2=$time+86399998;
        //print_r($time_1);
        print_r($time_2);

        $safecheck = DB::select("SELECT public.users_line.user_id, public.users_line.user_name, public.safe_check.line_id, public.safe_check.is_safe, public.safe_check.safe_location, public.safe_check.safe_mess, public.safe_check.time_update 
        FROM public.safe_check,public.users_line 
        WHERE public.users_line.line_userid = public.safe_check.line_id 
        AND public.safe_check.time_update >='$time_1'
        AND public.safe_check.time_update <='$time_2'
        AND public.safe_check.is_safe != 'Safe'");

        //dd($safecheck);

       
        return view('report.dashboard2report',compact('safecheck'));

    }
 
}
