<?php

namespace App\Console\Commands;

use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Console\Command;
use Illuminate\Support\Carbon;

class CalculateAveragePoints extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'userChallenge:averagePoints';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'calculate Average Points everyday automatically';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $today = Carbon::now()->addHour();
        $challenges= User::where('name','!=','mmm')->get(); // DB::table('challenges')->get();

        foreach($challenges as $cha)
        {
            //$challengStartDay=Carbon::createFromFormat('d-m-Y', $cha->created_at);
            //$today = Carbon::now()->addHour();
            $points=$cha->points;
            //$diff_in_days = $today->diffInDays($cha->created_at);
            //if ($diff_in_days==0)
                $cha->update(['points' => $points+10]);
          //  else
            //    $cha->update(['challengeDaysCount' => $diff_in_days, 'average'=>$points/$diff_in_days, 'points'=>$points+10]);
        }
    }
}
