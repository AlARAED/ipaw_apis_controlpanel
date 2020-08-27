<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Challenging;
use RealRashid\SweetAlert\Facades\Alert;
use App\User;
use Notification;
use App\Notifications\NewChallenge;

use App\Events\ChallengEvent;
use App\Models\Admin;




class challengController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
         $Challenging=Challenging::all();

        return view('cpanel.challenging',compact('Challenging'));
    }





          public function indexstore()
    {

        return view('cpanel.addchallene');
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
            'content_ar'   => 'required',
            'content_en' => 'required'
        ]);




      $Challenging = new Challenging();
      $Challenging->name_ar= $request->get('name_ar');
      $Challenging->name_en =$request->get('name_en');
      $Challenging->content_ar= $request->get('content_ar');
      $Challenging->content_en= $request->get('content_en');
      $Challenging->status= 1;


      $Challenging->enddate=$request->get('enddate');
      ;
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
                $Challenging->image =$new_au;

            }

      $Challenging->save();

     $user=User::all();
     $title="مسابقة جديدة";
     $sub_title = $Challenging;


   $token = User::select('*')->pluck('fcm_token')->toArray();




     //after store challenge send notification to all user >>>
    Notification::send($user,new NewChallenge($Challenging));
    Admin::find(1)->notify(new NewChallenge($Challenging));


         
    event(new ChallengEvent($Challenging));

    // listener or put directly code here
    

               Alert::success('نجاح العمية', '  تم التعديل بنجاح '); 
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
             $Challenging=Challenging::find($id);
        return view('cpanel.editchall',compact('Challenging'));
   
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
        $Challenging=Challenging::find($id);

    $Challenging->name_ar=$request->name_ar;
      $Challenging->name_en=$request->name_en;
      $Challenging->content_ar=$request->content_ar;
      $Challenging->content_en=$request->content_en;


      $Challenging->enddate=$request->enddate;

   
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
                $Challenging->image =$new_au;

            }
      $Challenging->update();

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
             $Challenging=Challenging::find($id);
               $Challenging->delete();
                Alert::success('نجاح العمية', '  تم التعديل بنجاح '); 
                return redirect()->back();
    }



}
