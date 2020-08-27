<?php

namespace App\Http\Controllers\Api\v1;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\CommentShare;
use RealRashid\SweetAlert\Facades\Alert;
use App\Models\Challenging;
use App\Http\Requests\CommentReequest;
class CommentShareController extends Controller
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
    public function store(Request $request)
    {


           $this->validate($request, [
            'challenging_id' => 'required',
            'content' => 'required',
            'comment_id' => 'required',

           


        ]);
       
     if(\Auth::user()->statusValue==1){



         $Comment = new CommentShare();
      $Comment->user_id=\Auth::user()->id;
      $Comment->challenging_id=$request->challenging_id;
          $Comment->comment_id=$request->comment_id;

          $Comment->content=$request->content;
          $Comment->save();

                  
        $status = true;
        $response = ['status' => $status , 'items' => $Comment ];


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
         $Comment=CommentShare::find($id);

         if(\Auth::user()->id == $Comment->user_id or \Auth::user()->id==1 ){

 if (isset($request->content)){
    $Comment->content=$request->content;
            }
     



      $Comment->update();
           
        $status = true;
        $response = ['status' => $status , 'items' => $Comment];
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
        

            $Comment=CommentShare::find($id); 
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
}
