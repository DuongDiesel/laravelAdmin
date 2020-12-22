<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;


class Seemore extends Controller
{
    //
    public function index($id){

        $id_1 = $id;

        $safecheck3 = DB::select("SELECT public.safe_check.line_id, public.safe_check.is_safe, public.safe_check.safe_mess, public.safe_check.time_update, public.safe_check.location, public.safe_check.safe_location
        FROM public.safe_check
        WHERE public.safe_check.id = '$id_1'
        ");

        $safecheck4 = DB::select("SELECT public.users_line.user_id, public.users_line.user_name, public.users_line.user_address
        FROM public.safe_check, public.users_line
        WHERE public.safe_check.id = '$id_1'
        AND public.safe_check.line_id = public.users_line.line_userid
        ");



        dd($safecheck4);

        return view('report.dashboardreportseemore',compact('safecheck3'));
    }
}
