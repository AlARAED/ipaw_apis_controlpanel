<?php

namespace App\Http\Controllers\Api\v1;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\FoodBlog;
use App\Models\CommentsFood;

use Notification;

use App\Notifications\CommentfoodblogNotification;


use RealRashid\SweetAlert\Facades\Alert;

use App\Http\Requests\CommentFoodBlogReequest;
use App\Models\Admin;

class FoodBlogController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    { 

        $FoodBlogs= FoodBlog::with('CommentsFood')->get();

         $status = true;
        $response = ['status' => $status , 'items' => $FoodBlogs  ];
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
    
    
public function searchfoodblog(Request $request) 
    { 


      $q=$request->q;
$user = FoodBlog::where( 'name_ar', 'LIKE', '%' . $q . '%' )->orwhere( 'name_en', 'LIKE', '%' . $q . '%' )->get();
    if (count ( $user ) > 0){

          $status = true;
        $response = ['status' => $status , 'items' => $user ];

}
    else{

         $response = ['status' => 'No Details found. Try to search again !' , 'items' => $user ];
}
    
         return response()->json($response); } 

    

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
                  $FoodBlogs= FoodBlog::where('id','=',$id)->with('CommentsFood')->get();
                    $status = true;
        $response = ['status' => $status , 'items' => $FoodBlogs  ];
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
 public function addcommentfoodblog(CommentFoodBlogReequest $request)
    {
          if(\Auth::user()->statusValue==1){
        $CommentsFood = new CommentsFood();

      $CommentsFood->food_blog_id=$request->food_blog_id;
      $CommentsFood->comment=$request->comment;
      $CommentsFood->user_id=\Auth::user()->id;
      $CommentsFood->save();


       $FoodBlog=FoodBlog::find($CommentsFood->food_blog_id);
         $lastpath= url('/uploads', $FoodBlog->image);

            Admin::find(1)->notify(new CommentfoodblogNotification($FoodBlog));




        $status = true;
        $response = ['status' => $status , 'items' => $FoodBlog ,'url'=> $lastpath ];
            
}

      else{
  $status = false;
        $response = ['status' => $status];
       


      }
 return response()->json($response);


    
    }


}
