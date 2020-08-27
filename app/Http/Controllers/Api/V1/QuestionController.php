<?php

namespace App\Http\Controllers\Api\v1;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Question;
use App\Http\Requests\QuestionRequest;
use App\Http\Requests\AnswerQuestionRequest;
use App\Models\Answers;
use App\User;
use App\Models\Admin;
use Notification;
use App\Notifications\AddquestionNotification;
use App\Notifications\arrivequestiontoadmin;
use App\Events\arrivequestion;





class QuestionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       $Question=Question::where('done_answer','=',1)
       ->where('state','<>',1)
       ->with('answers')
       ->get();

        $status = true;
        $response = ['status' => $status , 'items' => $Question  ];
         return response()->json($response);
    }



  public function indexprivate()
    {
       $Question=Question::where('user_id','=',\Auth::user()->id)
       ->where('done_answer','=',1)
       ->where('state','<>',0)
       ->with('answers')->get();

        $status = true;
        $response = ['status' => $status , 'items' => $Question  ];
         return response()->json($response);
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(QuestionRequest $request)
    {
          if(\Auth::user()->statusValue==1){
        $Question = new Question();

      $Question->question=$request->question;
      $Question->state=$request->state;
      $Question->user_id=\Auth::user()->id;
      $Question->save();
      User::find(\Auth::user()->id)->notify(new AddquestionNotification());
      Admin::find(1)->notify(new arrivequestiontoadmin($Question));

      $user_token=User::find(\Auth::user()->id);

 $notification=[
        'device_token'=>'eyJhbGciOiJSUzI1NiIsImtpZCI6Ijc2MjNlMTBhMDQ1MTQwZjFjZmQ0YmUwNDY2Y2Y4MDM1MmI1OWY4MWUiLCJ0eXAiOiJKV1QifQ.eyJpc3MiOiJodHRwczovL3NlY3VyZXRva2VuLmdvb2dsZS5jb20vaXBhdy03Yzg5YyIsImF1ZCI6ImlwYXctN2M4OWMiLCJhdXRoX3RpbWUiOjE1OTQwNzU0MTUsInVzZXJfaWQiOiJxRlZVMzJsQzNzZmVmSlNpeUdQT1BFRVI1MW4yIiwic3ViIjoicUZWVTMybEMzc2ZlZkpTaXlHUE9QRUVSNTFuMiIsImlhdCI6MTU5NDA3NTQxNSwiZXhwIjoxNTk0MDc5MDE1LCJlbWFpbCI6ImlwYXcyQGdtYWlsLmNvbSIsImVtYWlsX3ZlcmlmaWVkIjpmYWxzZSwiZmlyZWJhc2UiOnsiaWRlbnRpdGllcyI6eyJlbWFpbCI6WyJpcGF3MkBnbWFpbC5jb20iXX0sInNpZ25faW5fcHJvdmlkZXIiOiJwYXNzd29yZCJ9fQ.KUj-sGAkLjl46JG2UPp7DG4JPhnh82ydEMpfF46eSE8DKL-jTPkgiBzGceFo5wCQfevZ-UNmrJQB6-JVTqg4rVCE9flFPMIklDJPPt1Pqu6ARMZwRiTbbW13YCRvvBLJydZfrxxxxYLWrsnYgF5Z-urIfOFJFf8SblQbfurGmX_goM3UpCzE3yMp8AKtIgpVW2mMYPcdvgtty5GZIvPnnWTCfYwrSMY-ZCKaW0eJflBgJBZHGE2MRTEujmQX0RrwC50NL480HEnQG_XAm4a7oezkkCeN9-XS2WmMm0Wt8psbrnkTArQcSTx6uFtiAulJMmRf0CP7Lg9eM6ru7YYxwQ',
        'title'=>'New question ipaw',
        'body'=>'wait answer by adminstrator goodluck!',
      ];

                pushNotification($notification);




// dd( $user_token);
//       $tokens=[
//         $user_token->fcm_token,
//       ];
//      if(count($tokens))
//         {
//             $title = 'New question ipaw';
//             $content ='wait answer by adminstrator goodluck!';
//             $data =[
//                 // 'order_id' => $Question->user_id,
//                 // 'user_type' => $Question->user_id,
//             ];
//             $send = notifyByFirebase($title , $content , $tokens,$data);
//             info("firebase result: " . $send);
//         }




        // Notification::send(\Auth::user()->id,new AddquestionNotification($Question));
        // Admin::find(1)->notify(new AddquestionNotification($Question));



        $status = true;
        $response = ['status' => $status , 'items' => $Question ];

}

      else{
  $status = false;
        $response = ['status' => $status];



      }
 return response()->json($response);



    }





  public function storeanswerquestion(AnswerQuestionRequest $request)
    {
          if(\Auth::user()->statusValue==1){
        $Answers = new Answers();

      $Answers->question_id=$request->question_id;
      $Answers->answer=$request->answer;
      $Answers->user_id=\Auth::user()->id;




      $Answers->save();


       $Question=Question::find($Answers->question_id);

            Admin::find(1)->notify(new arrivequestiontoadmin($Question));




               // $Question=Question::find($request->question_id);
               //  $Question->done_answer=1;
               //  $Question->update();



        $status = true;
        $response = ['status' => $status , 'items' => $Answers ];

}

      else{
  $status = false;
        $response = ['status' => $status];



      }
 return response()->json($response);



    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
         $Question=Question::find($id);
            if(isset($Question)) {
          if(\Auth::user()->id == $Question->user_id or \Auth::user()->id==1 ){

               $Question->delete();


        $status = true;
        $response = ['status' => $status ];
      }
      else{
        $status = false;
        $response = ['status' => $status];


}
 }

 else{
        $status = false;
        $response = ['status' => $status];


}

return response()->json($response);

    }

}
