<?php

namespace App\Http\Controllers\Api\v1;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\SuiggestClinc;
use App\Models\Admin;
use App\Notifications\SuiggestClincNotification;

class suggestclincController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
         if(\Auth::user()->statusValue==1){

         $this->validate($request, [
            'name' => 'required',
            'link' => 'required',
            'message' => 'required',

        ]);


   $SuiggestClinc = new SuiggestClinc();
     $SuiggestClinc->user_id =\Auth()->user()->id;
       $SuiggestClinc->name =$request->name;
       $SuiggestClinc->link =$request->link;
       $SuiggestClinc->message =$request->message;
       $SuiggestClinc->save();
 Admin::find(1)->notify(new SuiggestClincNotification($SuiggestClinc));

                  
        $status = true;
        $response = ['status' => $status , 'items' => $SuiggestClinc ];


  }
      else{
  $status = false;
        $response = ['status' => $status];
       


      }
 return response()->json($response);


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
        //
    }
}
