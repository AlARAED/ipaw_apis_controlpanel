<?php

namespace App\Http\Controllers\Api\v1;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\executewarning;
use App\Models\Care;


class executewarningcontroller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($idanimal)
    {
       
$executewarning=executewarning::with('cares')->where('my_animal_id','=',$idanimal)->get();


        $status = true;
        $response = ['status' => $status , 'items' => $executewarning  ];
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


          $this->validate($request, [
            'my_animal_id' => 'required',
            'care_id' => 'required',
            'typerepeat' => 'required',
            'startdate' => 'required',


        ]);

        $li = executewarning::where([
                    ['my_animal_id', '=',$request->get('my_animal_id')],
                    ['care_id', '=', $request->get('care_id')]
                ])->first();

 if(!isset($li)){

      $executewarning = new executewarning();
      $executewarning->my_animal_id= $request->get('my_animal_id');
      $executewarning->care_id =$request->get('care_id');
      $executewarning->typerepeat =$request->get('typerepeat');
      $executewarning->startdate =$request->get('startdate');
        $executewarning->user_id= \Auth::user()->id;



        $executewarning->save();
        $status = true;
        $response = ['status' => $status , 'items' => $executewarning];




  }


     else{
        if(isset($li)){

  $status = 'you selected already ';
        $response = ['status' => $status , 'items' => $li ];

        }
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
         $executewarning=executewarning::find($id);  

          if (isset($request->typerepeat)){
         $executewarning->typerepeat =$request->get('typerepeat');
            }
     


      if (isset($request->startdate)){
         $executewarning->startdate =$request->get('startdate');
            }




         $executewarning->save();
           
        $status = true;
        $response = ['status' => $status  , 'items' => $executewarning];
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
             $executewarning=executewarning::where('id',$id)->delete();


        $status = true;
        $response = ['status' => $status ];
        return response()->json($response);

    }




    


      public function Donewarning(Request $request, $id)
    {
         $executewarning=executewarning::find($id);  


         $executewarning->startdate =$executewarning->newdate;
         $executewarning->save();
           
        $status = true;
        $response = ['status' => $status  , 'items' => $executewarning];
        return response()->json($response);  
    }

    
}
