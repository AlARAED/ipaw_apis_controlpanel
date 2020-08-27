<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Question;
use RealRashid\SweetAlert\Facades\Alert;
use App\Http\Requests\AnswerQuestionRequest;
use App\Models\Answers;
use Illuminate\Support\Str;
use App\User;


class QuestionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
         $Question=Question::all();
          return view('cpanel.allquestion',compact('Question'));

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



     public function storeanswerquestionadmin(Request $request,$id)
    { 


 $this->validate($request, [
            'answer'   => 'required',
        ]);

   
      $Answers = new Answers();
      $Answers->question_id=$id;
      $Answers->answer=strip_tags($request->get('answer')) ;
      $Answers->user_id=1;
      $Answers->save();

               $Question=Question::find($id);
                $Question->done_answer=1;
                $Question->update();




  $user_token=User::find($Question->user_id);


      $tokens=[ 
        $user_token->fcm_token,
      ];
     if(count($tokens))
        {
            $title = 'track your question ';
            $content ='you have message from admintratore!';
            $data =[
                'Question' => $Question->id,
            ];
            $send = notifyByFirebase($title , $content , $tokens,$data);
            info("firebase result: " . $send);


     Alert::success('نجاح العمية', '  تم التعديل بنجاح '); 
     return redirect()->back();

      



    }
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
          $Question= Question::where('id','=',$id)->with('answers')->get();

          return view('cpanel.question_id',compact('Question'));

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


    $Question =Question::where('id',$id)->first();
    $Question->delete();
  
     Alert::success('نجاح العمية', '  تم التعديل بنجاح '); 
                return redirect()->back();
    }
}
