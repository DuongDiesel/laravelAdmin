<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Charts;

class ChartController extends Controller
{
    public function index(){

        
        $A_respond = DB::select('SELECT DISTINCT
 
        count(*) 
         
        FROM 
         
        public.users_line 
         
        LEFT JOIN 
         
        public.safe_check
         
        ON 
         
        public.users_line.line_userid = public.safe_check .line_id 
         
        WHERE 
         
        public.safe_check .line_id IS NULL');
         
        $A_respond = $A_respond[0]->count;


        $All_respond= DB::select('SELECT 
        count(*) 
        FROM public.users_line');

        $All_respond = $All_respond[0]->count;

        // $b= ($All[0]->count) - ($a[0]->count);

        $b_respond= $All_respond - $A_respond;
        
        $A_Safe = DB::select("SELECT
         
         count (*)

         FROM public.safe_check
         
         WHERE 
         
         is_safe='Safe'
         
         and
         
         time_update >=1604298448104
         
         GROUP BY
         
          line_id");
          
         $A_Safe = $A_Safe[0]->count;
 
 
        $B_Safe= DB::select("SELECT 
        
        count (*)

         FROM public.safe_check
         
         WHERE 
         
         is_safe='Not Safe'
         
         and
         
         time_update >=1604298448104
         
         GROUP BY 
         
         line_id");
 
         $B_Safe = $B_Safe[0]->count;

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

         $safecheck = DB::select('SELECT public.users_line.user_id, public.users_line.user_name, public.safe_check.line_id, public.safe_check.is_safe, public.safe_check.safe_location, public.safe_check.safe_mess, public.safe_check.time_update FROM public.safe_check,public.users_line WHERE public.users_line.line_userid = public.safe_check.line_id AND public.safe_check.is_safe != "Safe" ');
         
        // return view('admin.chart')->with('pie_respond',$pie_respond);
         return view('admin.dashboard1',compact('pie_respond','pie_Safe','safecheck'));
         }
}
