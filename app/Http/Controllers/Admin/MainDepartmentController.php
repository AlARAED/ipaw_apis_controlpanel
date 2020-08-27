<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
  use App\Models\MainDepartment;
use RealRashid\SweetAlert\Facades\Alert;

class MainDepartmentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      
        $MainDepartment=MainDepartment::all();
        return view('cpanel.maindepartment',compact('MainDepartment'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
       $MainDepartment = new MainDepartment();
      $MainDepartment->name_ar=$request->name_ar;
      $MainDepartment->name_en=$request->name_en;
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
                $MainDepartment->image =$new_au;

            }
      $MainDepartment->save();
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
          $MainDepartment=MainDepartment::find($id);
               $MainDepartment->delete();
                Alert::success('نجاح العمية', '  تم التعديل بنجاح '); 
                return redirect()->back();
    }
}
