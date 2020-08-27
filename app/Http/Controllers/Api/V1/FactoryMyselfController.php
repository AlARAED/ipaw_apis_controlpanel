<?php

namespace App\Http\Controllers\Api\v1;

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
         $FactoryMyself= FactoryMyself::with('Commentsfactory')->get();

         $status = true;
        $response = ['status' => $status , 'items' => $FactoryMyself  ];
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
         $FactoryMyself= FactoryMyself::where('id','=',$id)->with('Commentsfactory')->get();
                    $status = true;
        $response = ['status' => $status , 'items' => $FactoryMyself  ];
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

     public function addcommentfactory_myself(CommentfactoryReequest $request)
    {
          if(\Auth::user()->statusValue==1){
        $CommentFactoryMyself = new CommentFactoryMyself();

      $CommentFactoryMyself->factory_myself_id=$request->factory_myself_id;
      $CommentFactoryMyself->comment=$request->comment;
      $CommentFactoryMyself->user_id=\Auth::user()->id;
      $CommentFactoryMyself->save();


       $FactoryMyself=FactoryMyself::find($CommentFactoryMyself->factory_myself_id);
         $lastpath= url('/uploads', $FactoryMyself->image);

            Admin::find(1)->notify(new CommentfactoryNotification($FactoryMyself));




        $status = true;
        $response = ['status' => $status , 'items' => $FactoryMyself ,'url'=> $lastpath ];
            
}

      else{
  $status = false;
        $response = ['status' => $status];
       


      }
 return response()->json($response);


    
    }
}
