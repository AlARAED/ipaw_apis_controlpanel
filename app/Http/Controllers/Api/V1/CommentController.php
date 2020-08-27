<?php

namespace App\Http\Controllers\Api\v1;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Comment;
use RealRashid\SweetAlert\Facades\Alert;
use App\Models\Challenging;
use App\Http\Requests\CommentReequest;

use App\Models\Like;

class CommentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
    public function store(CommentReequest $request)
    {


     if(\Auth::user()->statusValue==1){

         $Comment = new Comment();
      $Comment->user_id=\Auth::user()->id;
      $Comment->challenging_id=$request->challenging_id;

          $Comment->content=$request->content;
 $new_au="";
   if ($request->hasFile('image')) {

            $ext = pathinfo($request->file('image')->getClientOriginalName(),
                PATHINFO_EXTENSION);
         if ($ext=="png" || $ext=="jpg" || $ext=="gif") {

                $new_au= uniqid() . "." . $ext;


                $path = $request->file('image')->move('uploads',$new_au);
               $lastpath= url('/uploads',$new_au);
            }
        }

        if(isset($new_au))
            if ($new_au != ''  or $new_au != null) {
                $Comment->image =$new_au;

            }
  $Comment->save();

                  
        $status = true;
        $response = ['status' => $status , 'items' => $Comment ,'url'=> $lastpath ];


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


         $Comment=Comment::find($id);

         if(\Auth::user()->id == $Comment->user_id or \Auth::user()->id==1 ){

 if (isset($request->content)){
    $Comment->content=$request->content;
            }
     


    $new_au="";
   if ($request->hasFile('image')) {

            $ext = pathinfo($request->file('image')->getClientOriginalName(),
                PATHINFO_EXTENSION);
         if ($ext=="png" || $ext=="jpg" || $ext=="gif") {

                $new_au= uniqid() . "." . $ext;


                $path = $request->file('image')->move('uploads',$new_au);
                               $lastpath= url('/uploads',$new_au);

            }
        }
              

        if(isset($new_au)){
            if ($new_au != ''  or $new_au != null) {
                $Comment->image =$new_au;

            }
}

      $Comment->update();
           
        $status = true;
        $response = ['status' => $status , 'items' => $Comment  ,'url'=> $lastpath];
    }

else{
        $status = false;
        $response = ['status' => $status];
       

}
 return response()->json($response);


}

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {


            $Comment=Comment::find($id); 
            if(isset( $Comment)) {
          if(\Auth::user()->id == $Comment->user_id or \Auth::user()->id==1 ){

               $Comment->delete();


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



       public function addlike($idc,$idch)
    { 

      if(\Auth::user()->statusValue==1){

        $li = Like::where([
                    ['user_id', '=',\Auth::user()->id],
                    ['comment_id', '=', $idc]
                ])->first();

      

        if(!isset($li)){
      $Like = new Like();

      $Like->comment_id=$idc;
      $Like->challenging_id=$idch;

      $Like->likes= $Like->likes+1;
      $Like->user_id=\Auth::user()->id;

        $Like->save();
        $status = true;
        $response = ['status' => $status , 'items' => $Like];


    }

    else{
        if(isset($li)){

        if($li->likes>0){
             $li->likes=$li->likes-1;
              $li->update();
              if($li->likes==0)
                $li->delete();


        }


    }
         $status = true;
        $response = ['status' => $status , 'items' => $li ];


    }





}else{

  $status = false;
        $response = ['status' => $status];}


return response()->json($response);


    }







    public function alllike()
    {
         $likes= Comment::with('likes')->get();
         $status = true;
        $response = ['status' => $status , 'items' => $likes  ];
        return response()->json($response);


        // return view('allchallene',compact('Challenging'));
    }

}


