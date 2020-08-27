<?php
namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Http\Requests;
use DB;
use App\User ;
use Auth ;
use File ;
use Hash;
use Route ;
use Illuminate\Support\Facades\Password;
use App\Http\Controllers\Traits\FileUploadTrait;
use Illuminate\Support\Facades\Redirect;
use Validator;
use Notification;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    //use notif ;



    
    // protected function access_token(Request $request)
    // {
    //     $request->request->add([
    //         'grant_type' => $request->grant_type,
    //         'client_id' => $request->client_id,
    //         'client_secret' => $request->client_secret,
    //         'username' => $request->email,
    //         'password' => $request->password,
    //         'scope' => null,
    //     ]);
    //     $proxy = Request::create(
    //         'oauth/token',
    //         'POST'
    //     );


    //     return Route::dispatch($proxy);
    // }


 public function index(Request $request)
    {

        $user = Auth::guard('api')->user() ;


        $status = true;
        $response = ['status' => $status ,'items' =>$user];
        return response()->json($response);
    }
  
   
     public function store(Request $request)
    {








        //dd($request);
        //// validate from  app data
        if (!$request->has('client_id') or !$request->has('client_secret')){
            $status = false;
            $response = ['status' => $status ,'error' =>'forbidden'];
            return response()->json($response);
        }
        $client_app = DB::table('oauth_clients')->get();
        $progress = false ;
        foreach($client_app as $client){
            if ($client->id  == $request->get('client_id') ) $progress = true ;
        }
        if($progress){


            $validator = Validator::make($request->all(), [ 
            'name' => 'required', 
            'email' => 'required|email', 
            'password' => 'required', 
            'password_confirmation' => 'required|same:password', 
            'user' => 'required', 
             'tel' => 'required', 
              'fcm_token' => 'required', 

        ]);
if ($validator->fails()) { 
            return response()->json(['error'=>$validator->errors()], 401);            
        }

                $user = new User ;
                $user->name = $request->name;
                $user->email = $request->email;
                $user->password = bcrypt($request->password) ;
                $user->user = $request->user;
                $user->tel = $request->tel;
                $user->statusValue = 1;
                $user->countryName ='';
                $user->image ='user.png';
                $user->about='';
                $user->level=1;
                $user->fcm_token = $request->fcm_token;
                $user->save();
              
$lastpath= url('/uploads', $user->image);


                $accessToken = $user->createToken('authToken')->accessToken;
        return response(['user' => $user, 'access_token' => $accessToken ,'url'=>$lastpath]);


                    // return  $this->access_token($request) ;

            }

        }
       

  public function detailsauth() 
    { 
        $user = Auth::user(); 
        return response()->json(['success' => $user],200); 
    } 




      public function login(Request $request){ 
        if(Auth::attempt(['email' => request('email'), 'password' => request('password')])){ 
            $user = Auth::user(); 
            $success['token'] =  $user->createToken('MyApp')-> accessToken; 

            $lastpath= url('/uploads', $user->image);

   return response(['user' => $user,'access_token'=>$user->createToken('MyApp')-> accessToken  ,'url'=>$lastpath]);

                                 // return  $this->access_token($request) ;

        } 
        else{ 
            return response()->json(['error'=>'Unauthorised'], 401); 
        } 
    }




    public function resetpassword(Request $request){

        if (!$request->has('client_id') or !$request->has('client_secret')){

            $status = false;
            $response = ['status' => $status ,'error' =>'forbidden'];
            return response()->json($response);
        }
        $client_app = DB::table('oauth_clients')->get();
        $progress = false ;
        foreach($client_app as $client){
            if ($client->id  == $request->get('client_id') ) $progress = true ;
        }
        //dd($client);
        if($progress and $request->has('email')){
            //dd('alaa');
            $user = User::where('email' ,$request->email)->first() ;
            if($user) {

                $credentials = ['email' => $user->email];
                $response = Password::sendResetLink($credentials, function (Message $message) {
                    $message->subject('إعادة تعيين كلمة المرور ');
                });
                $response = Password::RESET_LINK_SENT;
                switch ($response) {
                    case Password::RESET_LINK_SENT:
                        $status = true;
                        $response = ['status' => $status ];
                        return response()->json($response);

                }

            }
        }


        $status = false;
        $response = ['status' => $status ];
        return response()->json($response);



    }


  public function changesettinguser(Request $request)
    {
    


    $User=User::find(\Auth::user()->id);

    $new_au="";
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
                $User->image =$new_au;

            }
}
            if (isset($request->name)) {

    $User->name=$request->name;
}
            if (isset($request->email)) {

    $User->email=$request->email;
}

       if (isset($request->password)) {

    $User->password=\Hash::make($request->password);
}


    $User->update();
   
         $status = true;
        $response = ['status' => $status , 'items' => $User ,'url'=> $lastpath];
                return response()->json($response);



    }


public function logoutApi()
{ 
    if (\Auth::check()) {
       \Auth::user()->AauthAcessToken()->delete();
    }
}




  public function alluser() 
    { 
        $user = User::all(); 
        return response()->json(['success' => $user],200); 
    } 






  public function allnotification() 
    { 


               
$user = User::find(\Auth::user()->id);


foreach ($user->notifications as $notification) 
     $status = true;
        $response = ['status' => $status , 'items' => $notification ];
        return response()->json($response);

    } 



public function show($id) 
    { 


        $user = User::find($id);


        return response()->json(['success' => $user],200); 
    } 


public function userauth() 
    { 


        $user = User::find(\Auth::user()->id);


        return response()->json(['success' => $user],200); 
    } 


public function search(Request $request) 
    { 


      $q=$request->q;
$user = User::where ( 'name', 'LIKE', '%' . $q . '%' )->get();
    if (count ( $user ) > 0){

          $status = true;
        $response = ['status' => $status , 'items' => $user ];

}
    else{

         $response = ['status' => 'No Details found. Try to search again !' , 'items' => $user ];
}
    
         return response()->json($response); } 

}