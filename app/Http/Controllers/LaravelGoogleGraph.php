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

$pie  =	 Charts::create('pie', 'highcharts')
            ->title('My nice chart')
            ->labels(['First', 'Second', 'Third'])
            ->values([5,10,20])
            ->dimensions(1000,500)
            ->responsive(false);
                    
     return view('admin.chart')->with('gender', json_encode($array))->with(compact('pie'));
    }

}
// Array ( 
//     [0] => Array ( 
//         [0] => Gender [1] => Number 
//         ) 
//         [1] => Array ( [0] => female [1] => 6 ) 
//         [2] => Array ( [0] => male [1] => 4 ) 
//     )


// Object ( 
//     [items:protected] => Array ( 
//         [0] => stdClass Object ( [gender] => female [number] => 6 ) 
//         [1] => stdClass Object ( [gender] => male [number] => 4 ) ) 
//     ) 