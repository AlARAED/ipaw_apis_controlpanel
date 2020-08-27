<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\User;

use App\Loqah;
use DB;
use App\Notifications\loqahno;




class loqahcommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'loqah_command';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'loqah';

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

   $finishTimeTable = Loqah::all();

  foreach ($finishTimeTable as $finishTimeTab) {

            $now = \Carbon\Carbon::now();

       $finishtime = \Carbon\Carbon::parse($finishTimeTab->date);
     $lengthOfAd = $finishtime->diffInDays($now); 
      if($lengthOfAd>0){

         print $lengthOfAd;
        }

        else{

  $user_token=User::find($finishTimeTab->user_id);


      $tokens=[ 
        $user_token->fcm_token,
      ];


     if(count($tokens))
        {
            $title = 'warning loqah now';
            $content ='you must execute loqah this day!';
            $data =[
                'loqah' => $finishTimeTab->id,
            ];
            $send = notifyByFirebase($title , $content , $tokens,$data);
            info("firebase result: " . $send);

      }


            User::find($finishTimeTab->user_id)->notify(new loqahno($finishTimeTab));

            }
}


}



}