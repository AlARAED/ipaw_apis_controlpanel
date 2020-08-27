<?php

namespace App\Http\Controllers\Api\v1;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\LibreryImage;


class LibraryImageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {


        $lastpath="";
          $LibreryImage=LibreryImage::where('user_id','=',\Auth::user()->id)->get();
          foreach($LibreryImage as  $LibreryImag){
                             $lastpath= url('/uploads',$LibreryImag->image);
                         }


        $status = true;
        $response = ['status' => $status , 'items' => $LibreryImage ,'url'=> $lastpath ];
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
    public function store(Request $request)
    {
      if(\Auth::user()->statusValue==1){

         $this->validate($request, [
            'image' => 'required'
        ]);


   $LibreryImage = new LibreryImage();
     $LibreryImage->user_id =\Auth()->user()->id;
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
                $LibreryImage->image =$new_au;

            }


   



      $LibreryImage->save();

                  
        $status = true;
        $response = ['status' => $status , 'items' => $LibreryImage ,'url'=> $lastpath ];


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
     $LibreryImage=LibreryImage::find($id)->delete();
         $status = true;
        $response = ['status' => $status ];
         return response()->json($response);

    }
}
