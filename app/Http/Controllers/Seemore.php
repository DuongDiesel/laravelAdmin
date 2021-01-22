<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use GMaps;

class Seemore extends Controller
{
    //
    public function index($id){

        $id_1 = $id;

        $safecheck3 = DB::select("SELECT public.safe_check.line_id, public.safe_check.is_safe, public.safe_check.safe_mess, public.safe_check.time_update, public.safe_check.location, public.safe_check.safe_location
        FROM public.safe_check
        WHERE public.safe_check.id = '$id_1'
        ");

        foreach ($safecheck3 as &$safecheck3tempdate) {
            $safecheck3tempdate->time_update = date("'m/d/Y H:i:s'",$safecheck3tempdate->time_update/ 1000+32400);
        }

        $safecheck4 = DB::select("SELECT public.users_line.user_id, public.users_line.user_name, public.users_line.user_address
        FROM public.safe_check, public.users_line
        WHERE public.safe_check.id = '$id_1'
        AND public.safe_check.line_id = public.users_line.line_userid
        ");

        $safecheck3Timeupdate = DB::select("SELECT  public.safe_check.time_update
        FROM public.safe_check
        WHERE public.safe_check.id = '$id_1'
        ");
        $safecheck3Timeupdate = $safecheck3Timeupdate[0]->time_update;
        $todate= date("'m/d/Y H:i:s'",$safecheck3Timeupdate/ 1000+32400);

        //map
        $location1 = $safecheck3[0]->location;
        $config = array();
        $config['center']=$location1;
        $config['zoom']='14';
        $config['map_height']='300px';
        //   $config['map_width']='300px';
        $config['scrollwheel']=false;
        GMaps::initialize($config);
    
        $map =GMaps::create_map();

        //dd($safecheck4);

        return view('report.dashboardreportseemore',compact('safecheck3','safecheck4','todate','map'));
    }
}
