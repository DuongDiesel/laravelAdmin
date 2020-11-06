<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Charts;

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
    //  print_r($data);
    //  print_r($array);

    $a = DB::select('SELECT DISTINCT

    count(*) 

    FROM 

    public.users_line  

    LEFT JOIN 

    public.safe_check

    ON 

    public.users_line.line_userid = public.safe_check .line_id  

    WHERE 

    public.safe_check .line_id IS NULL');
    //print_f($a);
    print_r($a[0]->count);
    $b= 3-$a; //3 mean all user on userline table

    $pie  =	 Charts::create('pie', 'highcharts')
                ->title('Rep or not')
                ->labels(['Replied', 'Not repply'])
                ->values([2,$a])
                ->dimensions(1000,500)
                ->responsive(false);
                        
        return view('admin.chart')->with('gender', json_encode($array))->with('pie',$pie);
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