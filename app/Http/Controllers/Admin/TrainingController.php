<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Admin;
use App\Models\Training;
use App\Http\Requests\TrainingRequest;
use RealRashid\SweetAlert\Facades\Alert;
use App\Models\Steps;
use App\Http\Requests\StepRequest;
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
          return view('cpanel.Training',compact('Training'));   
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */



    
  public function indexsteps($id)
    {
        $step=Steps::where('training_id','=',$id)->get();

          return view('cpanel.teps',compact('step'));   
    }



     public function indexvedio($id)
    {
        $TrainingVedio=TrainingVedio::where('training_id','=',$id)->get();
        return view('cpanel.TrainingVedio',compact('TrainingVedio'));   

        
    }




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
    public function store(TrainingRequest $request)
    {
     $Training = new Training();
      $Training->name_ar= $request->get('name_ar');
      $Training->name_en =$request->get('name_en');
 


       if (isset($request->image)) {
            $ext = pathinfo($request->image->getClientOriginalName(),
                PATHINFO_EXTENSION);
         if ($ext=="png" || $ext=="jpg" || $ext=="gif") {

                $new_au= uniqid() . "." . $ext;


                $path = $request->image->move('uploads',$new_au);
            }
        }

        if(isset($new_au))
            if ($new_au != ''  or $new_au != null) {
                $Training->image =$new_au;

            }

      $Training->save();


               Alert::success('نجاح العمية', '  تم  بنجاح '); 
                return redirect()->back();
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
         $Training=Training::find($id);

      

 if (isset($request->name_ar)){
    $Training->name_ar=$request->name_ar;
            }
     

      if (isset($request->name_en)){

  $Training->name_en=$request->name_en;
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
                $Training->image =$new_au;

            }
}

      $Training->update();



       Alert::success('نجاح العمية', '  تم التعديل بنجاح '); 
        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
         $Training =Training::where('id',$id)->first();
          $Training->delete();
  
           Alert::success('نجاح العمية', '  تم  بنجاح '); 
          return redirect()->back();
    }











    public function updatestep(Request $request, $id)
    {
         $Steps=Steps::find($id);

      

 if (isset($request->content_ar)){
    $Steps->content_ar=strip_tags($request->content_ar) ;
            }
     

      if (isset($request->content_en)){

  $Steps->content_en=  strip_tags($request->content_en) ;
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
                $Steps->image =$new_au;

            }
}

      $Steps->update();



       Alert::success('نجاح العمية', '  تم التعديل بنجاح '); 
        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
  


      public function destrostepy($id)
    {
         $Steps =Steps::where('id',$id)->first();
          $Steps->delete();
  
           Alert::success('نجاح العمية', '  تم  بنجاح '); 
          return redirect()->back();
    }





   public function destroyvedio($id)
    {
         $TrainingVedio =TrainingVedio::where('id',$id)->first();
          $TrainingVedio->delete();
  
           Alert::success('نجاح العمية', '  تم  بنجاح '); 
          return redirect()->back();
    }

 public function storestep(StepRequest $request,$id)
    {
     $Steps = new Steps();
      $Steps->content_ar=  strip_tags( $request->get('content_ar')) ;
      $Steps->content_en = strip_tags( $request->get('content_ar')) ;
      $Steps->training_id =$id;

 


       if (isset($request->image)) {
            $ext = pathinfo($request->image->getClientOriginalName(),
                PATHINFO_EXTENSION);
         if ($ext=="png" || $ext=="jpg" || $ext=="gif") {

                $new_au= uniqid() . "." . $ext;


                $path = $request->image->move('uploads',$new_au);
            }
        }

        if(isset($new_au))
            if ($new_au != ''  or $new_au != null) {
                $Steps->image =$new_au;

            }

      $Steps->save();


               Alert::success('نجاح العمية', '  تم  بنجاح '); 
                return redirect()->back();
    }



}
