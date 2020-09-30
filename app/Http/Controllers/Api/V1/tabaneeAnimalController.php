<?php

namespace App\Http\Controllers\Api\v1;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\tabanee;
use App\Http\Requests\tabaneeanimal;

class tabaneeAnimalController extends Controller
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
  public function alltabaneeanimal()
    {


           
        
  $tabanee=tabanee::join('users','users.id','=','tabanees.user_id')
           ->join('categories','categories.id','=','tabanees.category_id')
           ->select('tabanees.*','categories.*','users.name as user_name','users.name as user-name')->get();
        

        

        $status = true;
        $response = ['status' => $status , 'items' => $tabanee  ];
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
    public function store(tabaneeanimal $request)
    {
         $tabanee = new tabanee();
      $tabanee->user_id= \Auth()->user()->id;
      $tabanee->name =$request->get('name');
      $tabanee->age =$request->get('age');
      $tabanee->city =$request->get('city');
     $tabanee->no_mobile =$request->get('no_mobile');
     $tabanee->category_id =$request->get('category_id');
     $tabanee->note =$request->get('note');



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
                $tabanee->image =$new_au;

            }

            $tabanee->save();

   $status = true;
        $response = ['status' => $status , 'items' => $tabanee ,'url'=> $lastpath ];
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
        $tabanee=tabanee::find($id);        
         $tabanee->delete();
           
        $status = true;
        $response = ['status' => $status ];
        return response()->json($response);  
    }
}
