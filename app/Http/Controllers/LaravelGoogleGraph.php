<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class LaravelGoogleGraph extends Controller
{
    //
    function index()
    {
     $data = DB::table('tbl_employee')
       ->select(
        DB::raw('gender as gender'),
        DB::raw('count(*) as number'))
       ->groupBy('gender')
       ->get();
     $array[] = ['Gender', 'Number'];
     foreach($data as $key => $value)
     {
      $array[++$key] = [$value->gender, $value->number];
     }
     print_r($data);
     print_r($array);
     return view('admin.chart')->with('gender', json_encode($array));
    }

}
// Array ( 
//     [0] => Array ( 
//         [0] => Gender [1] => Number 
//         ) 
//         [1] => Array ( [0] => female [1] => 6 ) 
//         [2] => Array ( [0] => male [1] => 4 ) 
//     )
