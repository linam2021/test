<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use app\Models\user;
use Illuminate\Support\Facades\DB;
use DateTime;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    function test()
    {
        //$d= new DateTime('now');
        $d=new DateTime('now');
        $currentDBtime = DB::select( 'select NOW() as the_time , TIMEDIFF(NOW(), UTC_TIMESTAMP) as GMT_TIME_DIFF' );
        //$currentDBtime[0]->the_time;
        $response = [
            'success' => true,
            'date' =>$d,
            'dateD' => $currentDBtime[0]->the_time,
            'dif'=> $currentDBtime[0]->GMT_TIME_DIFF,
            'message' => 'User registered Successfully!'
        ];



        return response()->json($response,201);
        //return "H";
    }


}
