<?php

namespace App\Http\Controllers\Api\v1;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\FindAnimal;
use App\Http\Requests\LostAnimalRequest;
use App\Http\Requests\findAnimalRequest;




class findtAnimalController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function allfindanimal()
    {

        
  $FindAnimal=FindAnimal::join('users','users.id','=','find_animals.user_id')
           ->join('categories','categories.id','=','find_animals.category_id')
           ->select('find_animals.*','categories.*','users.name as user_name','users.name as user-name')->get();
        


        $status = true;
        $response = ['status' => $status , 'items' => $FindAnimal  ];
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
    public function store(findAnimalRequest $request)
    {
        $FindAnimal = new FindAnimal();
      $FindAnimal->user_id= \Auth()->user()->id;
      $FindAnimal->name =$request->get('name');
      $FindAnimal->age =$request->get('age');
      $FindAnimal->findplace =$request->get('findplace');
     $FindAnimal->no_mobile =$request->get('no_mobile');
     $FindAnimal->category_id =$request->get('category_id');
     $FindAnimal->note =$request->get('note');



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
                $FindAnimal->image =$new_au;

            }
}
            $FindAnimal->save();

         $status = true;
        $response = ['status' => $status , 'items' => $FindAnimal ,'url'=> $lastpath ];
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
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
       
         $FindAnimal=FindAnimal::find($id);        
         $FindAnimal->delete();
           
        $status = true;
        $response = ['status' => $status ];
        return response()->json($response); 
    }
}
