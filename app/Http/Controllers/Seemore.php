<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class Seemore extends Controller
{
    //
    public function index($id){

        $safecheck3 = DB::select("SELECT (*)
        FROM public.safe_check
        WHERE public.safe_check.id = '$id'
        ");

        dd($safecheck3);

        return view('report.dashboardreportseemore',compact('safecheck3'));
    }
}
