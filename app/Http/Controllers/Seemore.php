<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class Seemore extends Controller
{
    //
    public function index($id){

        $id_1=$id;

        $safecheck3 = DB::select("SELECT public.safe_check.line_id, public.safe_check.is_safe
        FROM public.safe_check
        WHERE public.safe_check.id = '$id_1'
        ");

        dd($safecheck3);

        return view('report.dashboardreportseemore');
    }
}
