<?php

namespace App\Http\Controllers\Api\v1;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Challenging;
use RealRashid\SweetAlert\Facades\Alert;
use App\Models\Comment;
use Carbon\Carbon;

class ChallengeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */


 public function __construct()
    {
             $this->middleware('auth');

//     $now = Carbon::now()->toDateString();
//     $finishTimeTable = Challenging::where('status',1)->first();
//        $finishtime = Carbon::parse($finishTimeTable->enddate);
//      $lengthOfAd = $finishtime->diffInDays($now);
//     if($lengthOfAd>0){
//          print $lengthOfAd;
//     }else{
//         $finishTimeTable->status=0;
//         $finishTimeTable->update();
//         
//     }

    }

    
    
    public function index()
    {
             $Challenging= Challenging::with('comments.CommentShare','comments.user','comments.likes')->get();

         foreach($Challenging as $Challeng){
         $lastpath= url('/uploads',$Challeng->image);
     }

         $status = true;
        $response = ['status' => $status , 'items' => $Challenging , 'url'=> $lastpath  ];
        return response()->json($response);


        // return view('allchallene',compact('Challenging'));
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
          $challenge = Challenging::find($id);
           $status = true;
        $response = ['status' => $status , 'items' => $challenge  ];
        return response()->json($response);

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
        //
    }

  public function indexdetails()
    {
           $Challeng=Challenging::find($id);
        return view('challengdeatails',compact('Challeng'));
   
    }



}
