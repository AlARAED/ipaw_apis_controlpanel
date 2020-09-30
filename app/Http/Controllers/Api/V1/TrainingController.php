<?php

namespace App\Http\Controllers\Api\v1;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\ExecutetrainingRequest;
use App\Models\ExecuteTraining;
use App\Models\Training;
use App\Models\Steps;
use App\Http\Requests\uploadvedioRequest;

use App\Models\TrainingVedio;

class TrainingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
         $Training=Training::all();

          $status = true;
          $response = ['status' => $status , 'items' =>$Training];

          return response()->json($response);
    }



 public function indexsteps($id)
    {
        $step=Steps::where('training_id','=',$id)->get();
          $status = true;
          $response = ['status' => $status , 'items' =>$step];

          return response()->json($response);
    }



      public function allvedio($id)
    {
        $TrainingVedio=TrainingVedio::where('training_id','=',$id)->get();
       $status = true;
          $response = ['status' => $status , 'items' =>$TrainingVedio];

          return response()->json($response);
        
    }




public function searchalltraining(Request $request) 
    { 


      $q=$request->q;
$user = Training::where( 'name_ar', 'LIKE', '%' . $q . '%' )->orwhere( 'name_en', 'LIKE', '%' . $q . '%' )->get();
    if (count ( $user ) > 0){

          $status = true;
        $response = ['status' => $status , 'items' => $user ];

}
    else{

         $response = ['status' => 'No Details found. Try to search again !' , 'items' => $user ];
}
    
         return response()->json($response); } 

 public function storevedio(uploadvedioRequest  $request)
    {
          $TrainingVedio = new TrainingVedio();

      
      $TrainingVedio->training_id= $request->get('training_id');
      $TrainingVedio->user_id =$request->get('user_id');


       $new_au="";
   if ($request->hasFile('vedio')) {

            $ext = pathinfo($request->file('vedio')->getClientOriginalName(),
                PATHINFO_EXTENSION);
       

                $new_au= uniqid() . "." . $ext;


                $path = $request->file('vedio')->move('uploads',$new_au);
                               $lastpath= url('/uploads',$new_au);

            
        }
              

        if(isset($new_au)){
            if ($new_au != ''  or $new_au != null) {
                $TrainingVedio->vedio =$new_au;

            } }


            $TrainingVedio->save();

          $status = true;
          $response = ['status' => $status , 'items' =>$TrainingVedio,'url'=>$lastpath];

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
    public function store(ExecutetrainingRequest  $request)
    {

  $li = ExecuteTraining::where([
                    ['my_animal_id', '=',$request->get('my_animal_id')],
                    ['training_id', '=', $request->get('training_id')]
                ])->first();

 if(!isset($li)){

      $ExecuteTraining = new ExecuteTraining();
      $ExecuteTraining->my_animal_id= $request->get('my_animal_id');
      $ExecuteTraining->training_id =$request->get('training_id');
      $ExecuteTraining->evalute =$request->get('evalute');


        $ExecuteTraining->save();
        $status = true;
        $response = ['status' => $status , 'items' => $ExecuteTraining];




  }


     else{
        if(isset($li)){

              $li->evalute=$request->get('evalute');
              $li->update();
  $status = true;
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





      public function  deltemyvedio($id)
    {

 $TrainingVedio=TrainingVedio::where('id',$id)->where('user_id',\Auth::user()->id)->delete();

        // $TrainingVedio =TrainingVedio::where('user_id',24)->where('id',6)
        // ->get();



            $status = true;
        $response = ['status' => $status ];

    return response()->json($response);

    }

}
