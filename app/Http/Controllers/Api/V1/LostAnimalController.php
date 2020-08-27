<?php

namespace App\Http\Controllers\Api\v1;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Http\Requests\MyAnimalRequest;
use App\Models\LostAnimal;
use App\Http\Requests\LostAnimalRequest;




class LostAnimalController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function alllostanimal()
    {


        $LostAnimal=LostAnimal::join('users','users.id','=','lost_animals.user_id')
        ->join('categories','categories.id','=','lost_animals.category_id')
        ->select('lost_animals.*','categories.*','users.name as user_name','users.name as user-name','image')->get();



        $status = true;
        $response = ['status' => $status , 'items' => $LostAnimal];
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

    $LostAnimal = new LostAnimal();
      $LostAnimal->user_id= \Auth()->user()->id;
      $LostAnimal->name =$request->get('name');
      $LostAnimal->age =$request->get('age');
      $LostAnimal->lostplace =$request->get('lostplace');
     $LostAnimal->lastseen =$request->get('lastseen');
     $LostAnimal->no_mobile =$request->get('no_mobile');
     $LostAnimal->category_id =$request->get('category_id');
     $LostAnimal->note =$request->get('note');



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
                $LostAnimal->image =$new_au;

            }


$animal=$request->get('my_animal_id');

if(isset($animal))
                $LostAnimal->my_animal_id =$animal;




            $LostAnimal->save();

   $status = true;
        $response = ['status' => $status , 'items' => $LostAnimal ,'url'=> $lastpath ];


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
              $LostAnimal = LostAnimal::where('my_animal_id','=',$id)->get();

        $status = true;
        $response = ['status' => $status , 'items' => $LostAnimal  ];
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

        $MyAnimal=LostAnimal::find($id);




      if (isset($request->name)){

  $MyAnimal->name=$request->name;
}


      if (isset($request->age)){

  $MyAnimal->age=$request->age;
}


     if (isset($request->lostplace)){

  $MyAnimal->lostplace=$request->lostplace;
}

 if (isset($request->lastseen)){

  $MyAnimal->lastseen=$request->lastseen;
}

if (isset($request->no_mobile)){

  $MyAnimal->no_mobile=$request->no_mobile;
}

if (isset($request->note)){

  $MyAnimal->note=$request->note;
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
          $LostAnimal=LostAnimal::find($id);
         $LostAnimal->delete();

        $status = true;
        $response = ['status' => $status ];
        return response()->json($response);
    }
}
