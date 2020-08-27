<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\FactoryMyself;
use RealRashid\SweetAlert\Facades\Alert;
use App\Http\Requests\factory_myself;
use App\Http\Requests\CommentfactoryReequest;
use App\Models\CommentFactoryMyself;
use App\Models\Admin;
use App\Notifications\CommentfactoryNotification;

class FactoryMyselfController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
         $FactoryMyself=FactoryMyself::all();
          return view('cpanel.factory_myself',compact('FactoryMyself'));
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
    public function store(factory_myself $request)
    {
         $FactoryMyself = new FactoryMyself();
      $FactoryMyself->content_ar= strip_tags($request->get('content_ar')) ;
      $FactoryMyself->content_en= strip_tags($request->get('content_en')) ;


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
                $FactoryMyself->image =$new_au;

            }

      $FactoryMyself->save();


               Alert::success('نجاح العمية', '  تم  بنجاح '); 
                return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
                      return view('cpanel.addfactory_myself');

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $factory_myself=FactoryMyself::find($id);
        return view('cpanel.editefactory',compact('factory_myself'));
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
         $FactoryMyself=FactoryMyself::find($id);
      if (isset($request->content_ar)){

       $FactoryMyself->content_ar= strip_tags($request->get('content_ar')) ;
        }

      if (isset($request->content_en)){

         $FactoryMyself->content_en=strip_tags($request->get('content_en')) ;
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
                $FactoryMyself->image =$new_au;

            }
}

      $FactoryMyself->update();



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
        $FactoryMyself =FactoryMyself::where('id',$id)->first();
          $FactoryMyself->delete();
  
           Alert::success('نجاح العمية', '  تم التعديل بنجاح '); 
          return redirect()->back();
    }




       public function commentsfactory_myself($id)
    { 
          $FactoryMyself= FactoryMyself::where('id','=',$id)->with('Commentsfactory')->get();

          return view('cpanel.commentsfactory',compact('FactoryMyself'));

    }



public function addcommentfactory_myself(CommentfactoryReequest $request,$id)
    {
        $CommentFactoryMyself = new CommentFactoryMyself();

      $CommentFactoryMyself->factory_myself_id=$id;
      $CommentFactoryMyself->comment=strip_tags($request->get('comment')) ;
      $CommentFactoryMyself->user_id=1;
      $CommentFactoryMyself->save();


      
Alert::success('نجاح العمية', '  تم التعديل بنجاح '); 
          return redirect()->back();

}
}