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
        //controller nay la cua safe_check board
        
        $time_1=$time;
        $time_2=$time+86399998;
        
        // //lated submit -ko dung cai nay
        // $safecheck = DB::select("SELECT public.users_line.user_id, public.users_line.user_name, public.safe_check.line_id, public.safe_check.is_safe, public.safe_check.safe_location, public.safe_check.safe_mess, public.safe_check.time_update 
        // FROM public.safe_check,public.users_line 
        // WHERE public.users_line.line_userid = public.safe_check.line_id 
        // AND public.safe_check.time_update >='$time_1'
        // AND public.safe_check.time_update <='$time_2'
        // AND public.safe_check.is_safe != 'Safe'");
        //----------------------------------------------------------------
        // sum user_line
        $safecheck1count = DB::select("SELECT COUNT (*)
        FROM (SELECT public.users_line.line_userid FROM public.users_line) AS z");
        $sum_user_line = $safecheck1count[0]->count;

        //----------------------------------------------------------------
        //lated submit per user-dung cai nay-day la nhung ng da su dung vao ngay hom day
        $safecheck2 = DB::select("SELECT DISTINCT ON (public.safe_check.line_id) public.safe_check.id, public.safe_check.line_id, public.safe_check.is_safe, public.safe_check.time_update, public.users_line.user_name
        FROM public.safe_check, public.users_line
        WHERE line_id IN (SELECT DISTINCT public.safe_check.line_id FROM public.safe_check)
        AND public.safe_check.time_update >='$time_1'
        AND public.safe_check.time_update <='$time_2'
        AND public.safe_check.line_id = public.users_line.line_userid
        ORDER BY public.safe_check.line_id, id desc;
        ");

        foreach ($safecheck2 as &$safecheck2tempdate) {
            $safecheck2tempdate->time_update = date("'m/d/Y H:i:s'",$safecheck2tempdate->time_update/ 1000+32400);
        }

        $safecheck2count = DB::select("SELECT COUNT(*) 
        FROM (SELECT DISTINCT ON (public.safe_check.line_id) public.safe_check.line_id
                FROM public.safe_check 
                WHERE line_id IN (SELECT DISTINCT public.safe_check.line_id AS line_id_sum FROM public.safe_check)
                AND public.safe_check.time_update >='$time_1'
                AND public.safe_check.time_update <='$time_2'
                ORDER BY public.safe_check.line_id, id DESC) AS x
        ");
        $usedPerDay = $safecheck2count[0]->count;
        $notUsedPerDay = $sum_user_line - $usedPerDay;
        //----------------------------------------------------------------

        // dung cai nay de hien ra nhung ng da nhap vao ngay hom day va not safe
        $safecheck3 = DB::select("SELECT tav.id, tav.line_id, tav.is_safe, tav.time_update
        FROM(SELECT DISTINCT ON (public.safe_check.line_id) public.safe_check.id, public.safe_check.line_id, public.safe_check.is_safe,public.safe_check.time_update
                FROM public.safe_check 
                WHERE line_id IN (SELECT DISTINCT public.safe_check.line_id FROM public.safe_check)
                AND public.safe_check.time_update >='$time_1'
                AND public.safe_check.time_update <='$time_2'
                ORDER BY public.safe_check.line_id, id desc) AS tav
        WHERE tav.is_safe != 'Safe'
        ");

        

        $safecheck3count = DB::select("SELECT COUNT (*)
        FROM (SELECT tav.line_id
                FROM(SELECT DISTINCT ON (public.safe_check.line_id) public.safe_check.line_id, public.safe_check.is_safe,public.safe_check.time_update
                    FROM public.safe_check 
                    WHERE line_id IN (SELECT DISTINCT public.safe_check.line_id FROM public.safe_check)
                    AND public.safe_check.time_update >='$time_1'
                    AND public.safe_check.time_update <='$time_2'
                    ORDER BY public.safe_check.line_id, id desc) AS tav
                WHERE tav.is_safe != 'Safe') AS y
        
        ");
        $usedNotSafePerDay = $safecheck3count[0]->count;
        $usedSafePerDay = $usedPerDay - $usedNotSafePerDay;

        //----------------------------------------------------------------
        //cai where in cua safecheck3
        // $safecheck4 = DB::select("SELECT DISTINCT public.safe_check.line_id 
        // FROM public.safe_check
        // WHERE public.safe_check.time_update >='$time_1'
        // AND public.safe_check.time_update <='$time_2'");

        //----------------------------------------------------------------

        // nhung nguoi ko su dung safecheck = notUsedPerDay
        // $safecheck5 = DB::select("SELECT public.users_line.line_userid
        // FROM public.users_line 
        // WHERE public.users_line.line_userid NOT IN (SELECT DISTINCT public.safe_check.line_id 
        // FROM public.safe_check
        // WHERE public.safe_check.time_update >='$time_1'
        // AND public.safe_check.time_update <='$time_2')
        // ");

        //----------------------------------------------------------------

        $pie_respond = Charts::create('pie', 'highcharts')
        ->title('返事状態')
        ->labels(['返事した', "返事しなかった"])
        ->values([$usedPerDay,$notUsedPerDay])
        ->dimensions(530,350)
        ->responsive(false);

        $pie_Safe = Charts::create('pie', 'highcharts')
        ->title('返事状態')
        ->labels(['安全', '危険'])
        ->values([$usedSafePerDay,$usedNotSafePerDay])
        ->dimensions(490,350)
        ->responsive(false);

        return view('report.dashboardreport',compact('safecheck2','safecheck3','pie_respond','pie_Safe'));

    }
 
}
