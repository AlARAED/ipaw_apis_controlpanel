<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\FoodBlog;
use RealRashid\SweetAlert\Facades\Alert;

use App\Http\Requests\FoodBlogRequest;
use App\Http\Requests\CommentFoodBlogReequest;
use App\Models\Admin;
use App\Models\CommentsFood;


class FoodBlogController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
         $FoodBlogs=FoodBlog::all();
          return view('cpanel.foodblog',compact('FoodBlogs'));
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
    public function store(FoodBlogRequest $request)
    {
         $FoodBlog = new FoodBlog();
      $FoodBlog->name_ar= $request->get('name_ar');
      $FoodBlog->name_en =$request->get('name_en');
      $FoodBlog->content_ar= $request->get('content_ar');
      $FoodBlog->content_en= $request->get('content_en');
       $FoodBlog->short_desc_ar= $request->get('short_desc_ar');
      $FoodBlog->short_desc_en= $request->get('short_desc_en');


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
                $FoodBlog->image =$new_au;

            }

      $FoodBlog->save();


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


        
               return view('cpanel.addfoodblog');

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
          $FoodBlog=FoodBlog::find($id);
        return view('cpanel.editefoodblog',compact('FoodBlog'));
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
           $FoodBlog=FoodBlog::find($id);

      

 if (isset($request->name_ar)){
    $FoodBlog->name_ar=$request->name_ar;
            }
     

      if (isset($request->name_en)){

  $FoodBlog->name_en=$request->name_en;
}


      if (isset($request->short_desc_ar)){

  $FoodBlog->short_desc_ar=$request->short_desc_ar;
}


     if (isset($request->short_desc_en)){

  $FoodBlog->short_desc_en=$request->short_desc_en;
}

 if (isset($request->content_ar)){

  $FoodBlog->content_ar=$request->content_ar;
}

if (isset($request->content_en)){

  $FoodBlog->content_en=$request->content_en;
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
                $FoodBlog->image =$new_au;

            }
}

      $FoodBlog->update();



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
          $FoodBlog =FoodBlog::where('id',$id)->first();
          $FoodBlog->delete();
  
           Alert::success('نجاح العمية', '  تم التعديل بنجاح '); 
          return redirect()->back();
    }




       public function commentsfood($id)
    { 
          $FoodBlogs= FoodBlog::where('id','=',$id)->with('CommentsFood')->get();

          return view('cpanel.food_blog_id',compact('FoodBlogs'));

    }



public function addcommentfoodblog(CommentFoodBlogReequest $request,$id)
    {
        $CommentsFood = new CommentsFood();

      $CommentsFood->food_blog_id=$id;
      $CommentsFood->comment=strip_tags($request->get('comment')) ;
      $CommentsFood->user_id=1;
      $CommentsFood->save();


      
Alert::success('نجاح العمية', '  تم التعديل بنجاح '); 
          return redirect()->back();



       
            



    
    }
    
}
