<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use DB;
use Charts;
use App\Http\Controllers\Controller;

class Dashboardreport extends Controller
{
    
    public function test($time){

        //print_r($time);
        info($time);
        $time_1=$time;
        $time_2=$time+86399998;
        //print_r($time_1);
        //print_r($time_2);

        

        //lated submit -ko dung cai nay
        $safecheck = DB::select("SELECT public.users_line.user_id, public.users_line.user_name, public.safe_check.line_id, public.safe_check.is_safe, public.safe_check.safe_location, public.safe_check.safe_mess, public.safe_check.time_update 
        FROM public.safe_check,public.users_line 
        WHERE public.users_line.line_userid = public.safe_check.line_id 
        AND public.safe_check.time_update >='$time_1'
        AND public.safe_check.time_update <='$time_2'
        AND public.safe_check.is_safe != 'Safe'");

        //dd($safecheck);
        //lated submit per user-dung cai nay-day la nhung ng da su dung vao ngay hom day
        $safecheck2 = DB::select("SELECT DISTINCT ON (public.safe_check.line_id) public.safe_check.line_id, public.safe_check.is_safe, public.safe_check.time_update
        FROM public.safe_check 
        WHERE line_id IN (SELECT DISTINCT public.safe_check.line_id FROM public.safe_check)
        AND public.safe_check.time_update >='$time_1'
        AND public.safe_check.time_update <='$time_2'
        ORDER BY public.safe_check.line_id, id desc;
        ");

        $safecheck2count = DB::select("SELECT count (*) FROM (SELECT DISTINCT ON (public.safe_check.line_id) public.safe_check.line_id, public.safe_check.is_safe, public.safe_check.time_update
        FROM public.safe_check 
        WHERE line_id IN (SELECT DISTINCT public.safe_check.line_id FROM public.safe_check)
        AND public.safe_check.time_update >='$time_1'
        AND public.safe_check.time_update <='$time_2'
        ORDER BY public.safe_check.line_id, id desc)");

        $abc=$safecheck2count[0]->count;
        dd($abc);
        // dung cai nay de hien ra nhung ng da nhap vao ngay hom day va not safe
        $safecheck3 = DB::select("SELECT tav.line_id, tav.is_safe, tav.time_update
        FROM(SELECT DISTINCT ON (public.safe_check.line_id) public.safe_check.line_id, public.safe_check.is_safe,public.safe_check.time_update
            FROM public.safe_check 
            WHERE line_id IN (SELECT DISTINCT public.safe_check.line_id FROM public.safe_check)
            AND public.safe_check.time_update >='$time_1'
            AND public.safe_check.time_update <='$time_2'
            ORDER BY public.safe_check.line_id, id desc) AS tav
        WHERE tav.is_safe != 'Safe'");

        //dd($safecheck3);

        $safecheck4 = DB::select("SELECT DISTINCT public.safe_check.line_id 
        FROM public.safe_check
        WHERE public.safe_check.time_update >='$time_1'
        AND public.safe_check.time_update <='$time_2'");

        //dd($safecheck4);

        $safecheck5 = DB::select("SELECT public.users_line.line_userid
        FROM public.users_line 
        WHERE public.users_line.line_userid NOT IN (SELECT DISTINCT public.safe_check.line_id 
        FROM public.safe_check
        WHERE public.safe_check.time_update >='$time_1'
        AND public.safe_check.time_update <='$time_2')
        
        ");

        $b_respond=3;
        $A_respond=3;
        $A_Safe=3;
        $B_Safe=3;

        $pie_respond = Charts::create('pie', 'highcharts')
        ->title('Answer Status')
        ->labels(['Replied', "Didn't reply"])
        ->values([$b_respond,$A_respond])
        ->dimensions(530,350)
        ->responsive(false);

        $pie_Safe = Charts::create('pie', 'highcharts')
        ->title('Safety Status')
        ->labels(['Safe', 'Not Safe'])
        ->values([$A_Safe,$B_Safe])
        ->dimensions(490,350)
        ->responsive(false);

        //dd($safecheck5);

        return view('report.dashboard2report',compact('safecheck','safecheck2','safecheck3'));

    }
 
}
