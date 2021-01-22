<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use DB;
use Charts;
use App\Http\Controllers\Controller;

class Dashboard1report extends Controller
{
    

    public function test($time){
        print_r($time);
        info($time);
        $time_1=$time;
        $time_2=$time+86399998;
        //print_r($time_1);
        print_r($time_2);

        $tempcheck = DB::select("SELECT public.users_line.user_id, public.users_line.user_name, public.temp_check.line_id, public.temp_check.temp, public.temp_check.temp_time 
        FROM public.temp_check,public.users_line 
        WHERE public.users_line.line_userid = public.temp_check.line_id 
        AND public.temp_check.temp_time >='$time_1'
        AND public.temp_check.temp_time <='$time_2'");

        $tempchecklast = $tempcheck;

        foreach ($tempcheck as &$tempchecktemp) {
            $tempchecktemp->time_update = date("'m/d/Y H:i:s'",$tempchecktemp->time_update/ 1000+32400);
        }
        dd($tempcheck);

        return view('report.dashboard1report',compact('tempcheck'));

    }
 
}
