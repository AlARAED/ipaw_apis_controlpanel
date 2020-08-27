<?php

namespace App\Http\Controllers\Api\v1;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Loqah;

class loqshcontroller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($idanimal)
    {
         $Loqah=Loqah::where('my_animal_id','=',$idanimal)->get();

        $status = true;
        $response = ['status' => $status , 'items' => $Loqah  ];
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
            'date' => 'required',
           


        ]);

        $li = Loqah::where([
                    ['my_animal_id', '=',$request->get('my_animal_id')],
                   
                ])->first();



 if(!isset($li)){

      $Loqah = new Loqah();
        $Loqah->user_id= \Auth::user()->id;
        $Loqah->my_animal_id= $request->get('my_animal_id');
      $Loqah->date =$request->get('date');



        $Loqah->save();
        $status = true;
        $response = ['status' => $status , 'items' => $Loqah];




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
         $Loqah=Loqah::find($id);  

       


      if (isset($request->date)){
      $Loqah->date =$request->get('date');
            }




         $Loqah->save();
           
        $status = true;
        $response = ['status' => $status  , 'items' => $Loqah];
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
          $Loqah=Loqah::where('id',$id)->delete();


        $status = true;
        $response = ['status' => $status ];
        return response()->json($response);
    }
}
