<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\executewarning;
use App\User;

use App\Notifications\warningnot;

class warningcommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'warning_command';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

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
     * @return mixed
     */
    public function handle()
    {

   $finishTimeTable = executewarning::all();
    $now = \Carbon\Carbon::now();


        foreach ($finishTimeTable as $finishTimeTab) {





            $typerepeat = $finishTimeTab->typerepeat;
            if($typerepeat=='daily')
                $noday=1;
            if($typerepeat=='2day')
                $noday=2;
            if($typerepeat=='3day')
                $noday=3;
            if($typerepeat=='4day')
                $noday=4;
            if($typerepeat=='weakly')
                $noday=7;
            if($typerepeat=='2weak')
                $noday=14;
            if($typerepeat=='3weak')
                $noday=21;

            if($typerepeat=='monthly')
                $noday=30;

            if($typerepeat=='2month')
                $noday=60;
            if($typerepeat=='3month')
                $noday=90;
            if($typerepeat=='6month')
                $noday=180;
            if($typerepeat=='yearly')
                $noday=360;




       $finishtime = \Carbon\Carbon::parse($finishTimeTab->startdate);
           $newdate = $finishtime->addDays($noday);



     $lengthOfAd = $newdate->diffInDays($now); 
      if($lengthOfAd>0){
         print $lengthOfAd;
    }
    else
    {
         $finishTimeTab->newdate=$newdate;
        $finishTimeTab->update();






  $user_token=User::find($finishTimeTab->user_id);


      $tokens=[ 
        $user_token->fcm_token,
      ];


     if(count($tokens))
        {
            $title = 'warning care now';
            $content ='you must execute the care for your animal!';
            $data =[
                'care' => $finishTimeTab->id,
            ];
            $send = notifyByFirebase($title , $content , $tokens,$data);
            info("firebase result: " . $send);

      }


                  User::find($finishTimeTab->user_id)->notify(new warningnot($finishTimeTab));


}
}
}






  
}
