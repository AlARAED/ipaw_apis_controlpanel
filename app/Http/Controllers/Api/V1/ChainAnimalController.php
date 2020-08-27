<?php

namespace App\Http\Controllers\Api\v1;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\CommentchainanimalReequest;
use App\Models\CommentChainAnimal;
use App\Models\ChainAnimal;

use Notification;

use App\Notifications\CommentchainanimalNotification;
use App\Models\Admin;


class ChainAnimalController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($id)
    {
     $ChainAnimal= ChainAnimal::where('departchain_id','=',$id)->with('Commentschain')->get();

         $status = true;
        $response = ['status' => $status , 'items' => $ChainAnimal  ];
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
            $ChainAnimal= ChainAnimal::where('id','=',$id)->with('Commentschain')->get();
                    $status = true;
        $response = ['status' => $status , 'items' => $ChainAnimal  ];
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



     public function addcommentchainanimal(CommentchainanimalReequest $request)
    {
          if(\Auth::user()->statusValue==1){
        $CommentChainAnimal = new CommentChainAnimal();

      $CommentChainAnimal->chain_animal_id=$request->chain_animal_id;
      $CommentChainAnimal->comment=$request->comment;
      $CommentChainAnimal->user_id=\Auth::user()->id;
      $CommentChainAnimal->save();


       $ChainAnimal=ChainAnimal::find($CommentChainAnimal->chain_animal_id);
         $lastpath= url('/uploads', $ChainAnimal->image);

            Admin::find(1)->notify(new CommentchainanimalNotification($ChainAnimal));




        $status = true;
        $response = ['status' => $status , 'items' => $ChainAnimal ,'url'=> $lastpath ];
            
}

      else{
  $status = false;
        $response = ['status' => $status];
       


      }
 return response()->json($response);


    
    }



    
}
