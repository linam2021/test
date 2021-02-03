<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use app\Models\User;
use Illuminate\Support\Facades\DB;
use DateTime;
use Illuminate\Support\Carbon;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function insert()
    {
        DB::table('users')->insert([
            'name' =>'hero_instagram',
            'email' => 'hero_target',
            'password'=>'dfsd',
            'points'=>0]);
        $response = [
            'success' => true
        ];
        return response()->json($response,201);
    }
    function test()
    {
        //$d= new DateTime('now');
        $d=new DateTime('now');
        $newTime = Carbon::now()->addHours(1);
       // $currentDBtime = DB::select( 'select NOW() as the_time , TIMEDIFF(NOW(), UTC_TIMESTAMP) as GMT_TIME_DIFF' );
        //$currentDBtime[0]->the_time;
        $currentDBtime = DB::select( 'select NOW() as the_time ' );

        $challenges= User::where('name','!=','mmm')->first(); // DB::table('challenges')->get();






        $response = [
            'success' => true,
            'date' =>$d,
            'dateD' => $currentDBtime[0]->the_time,
            'dd'=>$newTime,
           // 'dif'=> $currentDBtime[0]->GMT_TIME_DIFF,
            'message' => 'User registered Successfully!',
            'points'=> $challenges->points
        ];



        return response()->json($response,201);
        //return "H";
    }


}
