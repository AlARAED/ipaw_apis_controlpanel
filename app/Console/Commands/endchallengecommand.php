<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\User;
use App\Models\Challenging;

use Notification;
use App\Models\Comment;

use App\Models\Like;

use DB;
use App\Notifications\EndChallenge;

use App\Models\Admin;





class endchallengecommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'end_challeng';

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
 $user=User::all();

   $finishTimeTable = Challenging::where('status',1)->get();

        foreach ($finishTimeTable as $finishTimeTab) {

            $now = \Carbon\Carbon::now();

       $finishtime = \Carbon\Carbon::parse($finishTimeTab->enddate);
     $lengthOfAd = $finishtime->diffInDays($now); 
      if($lengthOfAd>0){
         print $lengthOfAd;
    }else{
 $finishTimeTab->status=0;
        $finishTimeTab->update();
       
// SELECT MAX(mcount),comment_id FROM (select COUNT(likes) mcount,comment_id from `likes` WHERe likes.`likes`=1 AND challenging_id=2 GROUP by comment_id) a GROUP by comment_id

//from here i wanna to solve it 

         $data = DB::select('SELECT MAX(mcount),comment_id FROM (select COUNT(likes.likes) AS mcount,comment_id from likes WHERe likes.likes=1 AND challenging_id=? GROUP by comment_id) a GROUP by comment_id', [$finishTimeTab->id]);
         $user_won=0;
            if(count($data)>0){
                 $user_won=Comment::find($data[0]->comment_id);

              $finishTimeTab->user_id= $user_won->user_id;
              $finishTimeTab->update();

              $ownerusers = DB::table('users')
            ->join('challengings', 'users.id', '=', 'challengings.user_id')
            ->where('users.id','=',$user_won->user_id)
            ->select('users.*')
            ->first();


                  Notification::send($user,new EndChallenge($finishTimeTab));
                 Admin::find(1)->notify(new EndChallenge($finishTimeTab));




}



//send name he wone

dd($ownerusers);
       






        }


      
     
    }
}}
