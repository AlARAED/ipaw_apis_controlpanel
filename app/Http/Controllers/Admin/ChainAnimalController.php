<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ChainAnimal;
use App\Models\Admin;
use App\Models\CommentChainAnimal;
use App\Models\Category;

use App\Http\Requests\ChainAnimals;
use RealRashid\SweetAlert\Facades\Alert;

use App\Http\Requests\CommentchainanimalReequest;


       use App\departchain;

class ChainAnimalController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
         $ChainAnimal=ChainAnimal::all();


          return view('cpanel.chainanimal',compact('ChainAnimal'));   
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



       public function commentschainanimal($id)
    { 
          $ChainAnimal= ChainAnimal::where('id','=',$id)->with('Commentschain')->get();

          return view('cpanel.chain_aninaml_id',compact('ChainAnimal'));

    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ChainAnimals $request)
    {
        $ChainAnimal = new ChainAnimal();
      $ChainAnimal->name_ar= $request->get('name_ar');
      $ChainAnimal->name_en =$request->get('name_en');
      $ChainAnimal->content_ar= $request->get('content_ar');
      $ChainAnimal->content_en= $request->get('content_en');
       $ChainAnimal->departchain_id= $request->get('category_id');


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
                $ChainAnimal->image =$new_au;

            }

      $ChainAnimal->save();


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


         $Category=departchain::all();

                      return view('cpanel.addchainanimal',compact('Category'));

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $ChainAnimal=ChainAnimal::find($id);
        return view('cpanel.editeChainAnimal',compact('ChainAnimal'));
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
         $ChainAnimal=ChainAnimal::find($id);

      

 if (isset($request->name_ar)){
    $ChainAnimal->name_ar=$request->name_ar;
            }
     

      if (isset($request->name_en)){

  $ChainAnimal->name_en=$request->name_en;
}


 
 if (isset($request->content_ar)){

  $ChainAnimal->content_ar=$request->content_ar;
}

if (isset($request->content_en)){

  $ChainAnimal->content_en=$request->content_en;
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
                $ChainAnimal->image =$new_au;

            }
}

      $ChainAnimal->update();



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
         $ChainAnimal =ChainAnimal::where('id',$id)->first();
          $ChainAnimal->delete();
  
           Alert::success('نجاح العمية', '  تم التعديل بنجاح '); 
          return redirect()->back();
    }



public function addcommentchainanimal(CommentchainanimalReequest $request,$id)
    {
        $CommentChainAnimal = new CommentChainAnimal();

      $CommentChainAnimal->chain_animal_id=$id;
      $CommentChainAnimal->comment=strip_tags($request->get('comment')) ;
      $CommentChainAnimal->user_id=1;
      $CommentChainAnimal->save();



      
         Alert::success('نجاح العمية', '  تم التعديل بنجاح '); 
          return redirect()->back();



       
            



    
    }
}

