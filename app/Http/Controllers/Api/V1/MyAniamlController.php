<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\MyAnimal;
use App\Http\Requests\MyAnimalRequest;

use App\Models\Training;
use App\Models\ExecuteTraining;


class MyAniamlController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $MyAnimal=MyAnimal::join('categories','categories.id','=','my_animals.category_id')
           ->select('my_animals.*','categories.*','my_animals.image','my_animals.id')
           ->where('user_id','=',\Auth::user()->id)->get();

        
           
           
           
        $status = true;
        $response = ['status' => $status , 'items' => $MyAnimal  ];
         return response()->json($response);    }

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
    public function store(MyAnimalRequest $request)
    {


     if(\Auth::user()->statusValue==1){
        $MyAnimal = new MyAnimal();
      $MyAnimal->name=$request->name;
      $MyAnimal->description=$request->description;
      $MyAnimal->birth=$request->birth;
      $MyAnimal->gender=$request->gender;
      $MyAnimal->category_id=$request->category_id;
          $MyAnimal->user_id=\Auth::user()->id;



    $new_au="";  $lastpath="";
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
                $MyAnimal->image =$new_au;

            }
}

      $MyAnimal->save();


        $status = true;
        $response = ['status' => $status , 'items' => $MyAnimal  ,'url'=> $lastpath];
            
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
        $MyAnimal=MyAnimal::where('id','=',$id)->get();

        $status = true;
        $response = ['status' => $status , 'items' => $MyAnimal  ];
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
       

         $MyAnimal=MyAnimal::find($id);

         if(\Auth::user()->id == $MyAnimal->user_id or \Auth::user()->id==1 ){

 if (isset($request->content)){
    $MyAnimal->content=$request->content;
            }
     

      if (isset($request->name)){

  $MyAnimal->name=$request->name;
}


      if (isset($request->description)){

  $MyAnimal->description=$request->description;
}


     if (isset($request->birth)){

  $MyAnimal->birth=$request->birth;
}

 if (isset($request->gender)){

  $MyAnimal->gender=$request->gender;
}

if (isset($request->category_id)){

  $MyAnimal->category_id=$request->category_id;
}





    $new_au="";  $lastpath="";
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
                $MyAnimal->image =$new_au;

            }
}

      $MyAnimal->update();
           
        $status = true;
        $response = ['status' => $status , 'items' => $MyAnimal  ,'url'=> $lastpath];
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
           $MyAnimal=MyAnimal::find($id); 
            if(isset( $MyAnimal)) {
          if(\Auth::user()->id == $MyAnimal->user_id or \Auth::user()->id==1 ){

               $MyAnimal->delete();


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



  public function allevaluate_animal($id)
    {
        $my_animal_id=ExecuteTraining::where('my_animal_id','=',$id)->pluck('evalute');
  $status = true;
        $response = ['status' => $status , 'items' => $my_animal_id  ];
        return response()->json($response);
    }


}
