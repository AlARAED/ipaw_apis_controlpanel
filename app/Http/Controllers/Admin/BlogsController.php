<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Blog;
use App\Models\MainDepartment;
use App\Http\Requests\blogsRequest;
use RealRashid\SweetAlert\Facades\Alert;

class BlogsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
         $Blog=Blog::all();
          return view('cpanel.blogs',compact('Blog'));
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
    public function store(blogsRequest $request)
    {
      $Blog = new Blog();
      $Blog->name_ar= $request->get('name_ar');
      $Blog->name_en =$request->get('name_en');
      $Blog->content_ar= $request->get('content_ar');
      $Blog->content_en= $request->get('content_en');
      $Blog->short_desc_ar= $request->get('short_desc_ar');
      $Blog->short_desc_en= $request->get('short_desc_en');
      $Blog->main_department_id= $request->get('main_department_id');


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
                $Blog->image =$new_au;

            }

      $Blog->save();


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


                 $MainDepartment=MainDepartment::all();

        return view('cpanel.addblogs',compact('MainDepartment'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $Blog=Blog::find($id);

           $MainDepartment=MainDepartment::all();

        return view('cpanel.editeblog',compact('Blog','MainDepartment'));
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
        $Blog=Blog::find($id);

      

 if (isset($request->name_ar)){
    $Blog->name_ar=$request->name_ar;
            }
     

      if (isset($request->name_en)){

  $Blog->name_en=$request->name_en;
}


      if (isset($request->short_desc_ar)){

  $Blog->short_desc_ar=$request->short_desc_ar;
}


     if (isset($request->short_desc_en)){

  $Blog->short_desc_en=$request->short_desc_en;
}

 if (isset($request->content_ar)){

  $Blog->content_ar=$request->content_ar;
}

if (isset($request->content_en)){

  $Blog->content_en=$request->content_en;
}

if (isset($request->main_department_id)){

  $Blog->main_department_id=$request->main_department_id;
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
                $Blog->image =$new_au;

            }
}

      $Blog->update();



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
          $Blog =Blog::where('id',$id)->first();
          $Blog->delete();
  
           Alert::success('نجاح العمية', '  تم التعديل بنجاح '); 
          return redirect()->back();
    }



    
}
