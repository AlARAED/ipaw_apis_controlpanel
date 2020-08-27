<?php

namespace App\Http\Controllers\Api\v1;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
      use App\Models\Blog;
use App\Models\MainDepartment;


class BlogsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($id)
    {

      $Blog = Blog::where('main_department_id','=',$id)->get();

        $status = true;
        $response = ['status' => $status , 'items' => $Blog];
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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $Blog = Blog::find($id);
           $status = true;
        $response = ['status' => $status , 'items' => $Blog  ];
        return response()->json($response);
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



    public function allmaindepartment()
    {

        $MainDepartment=MainDepartment::all();
        $status = true;
        $response = ['status' => $status , 'items' => $MainDepartment];
        return response()->json($response);

       
    }




public function searchblog(Request $request) 
    { 


      $q=$request->q;
$user = Blog::where( 'name_ar', 'LIKE', '%' . $q . '%' )->orwhere( 'name_en', 'LIKE', '%' . $q . '%' )->get();
    if (count ( $user ) > 0){

          $status = true;
        $response = ['status' => $status , 'items' => $user ];

}
    else{

         $response = ['status' => 'No Details found. Try to search again !' , 'items' => $user ];
}
    
         return response()->json($response); 



     } 
}
