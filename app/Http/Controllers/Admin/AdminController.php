<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use auth;
use App\User;
use RealRashid\SweetAlert\Facades\Alert;
use App\Models\Admin;
use \Crypt;
 use Hash;


class AdminController extends Controller
{
     public function __construct()
    {
         $this->middleware('auth:admin')->except('ShowformLogin','adminLogin');
    }


      public function index()
       {



$nouser=user::all();

      return view('cpanel.home',compact('nouser'));

       }

        public function ShowformLogin()
       {
         return view('cpanel.admin_login');
       }


       

        public function adminLogin(Request $request)
    {
        
      $this->validate($request, [
            'name'   => 'required',
            'password' => 'required|min:6'
        ]);



        if (Auth::guard('admin')->attempt(['name' => $request->name, 'password' => $request->password], $request->get('remember'))) {

            return redirect()->intended('admin/index');
        }
        return back()->withInput($request->only('name', 'remember'));
    }


        public function Members()
    {
      $user=User::all();
      return view('cpanel.members',compact('user'));


    }


  public function Changestatus(Request $request,$id)
    {
      $user=User::find($id);
    if($user->statusValue==1)


      $user->statusValue=0;
    
      else
         $user->statusValue=1;
      
     $user->update();
      Alert::success('نجاح العمية', 'تمت العملية بنجاح ');
    

         return redirect()->back()->with('message', 'تم تعديل  بنجاح !');
    }


    
 public function Change_Setting_Admin()
    {
    
    $admin=Admin::find(1);

      return view('cpanel.settingprofileadmin',compact('admin'));


    }



     public function Change_Setting(Request $request)
    {
    


    $admin=Admin::find(1);
 //     $encrypted = Crypt::encryptString('Hello world.');
 // return $decrypted = Crypt::decryptString($encrypted);


    $admin->name=$request->name;
    $admin->email=$request->email;
    $admin->update();
    Alert::success('نجاح العمية', '  تم التعديل بنجاح '); 
    return redirect()->back();


    }

   public function Changesettingadminimage(Request $request)
    {
    


    $admin=Admin::find(1);
   
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
                $admin->image =$new_au;

            }
      $admin->update();

        Alert::success('نجاح العمية', '  تم التعديل بنجاح '); 
        return redirect()->back();


    }

    

   public function Changesettingadminpass(Request $request)
    {
    


    $admin=Admin::find(1);
    $admin->password=Hash::make($request->password)  ;
    $admin->update();
        
            
    

        Alert::success('نجاح العمية', '  تم التعديل بنجاح '); 
        return redirect()->back();


    }
    
 public function aboutus()
    {
        $admin=Admin::find(1);

      return view('cpanel.aboutus',compact('admin'));


    }
     public function Changesettingadminabout(Request $request)
    {
     $this->validate($request, [
            'aboutsite_ar'   => 'required',
            'aboutsite_en' => 'required'
        ]);


    $admin=Admin::find(1);
 //     $encrypted = Crypt::encryptString('Hello world.');
 // return $decrypted = Crypt::decryptString($encrypted);


    $admin->emailsite=$request->emailsite;
    $admin->Watsapp=$request->Watsapp;
     $admin->Watsapp=$request->Watsapp;
      $admin->aboutsite_ar=$request->aboutsite_ar;
       $admin->aboutsite_en=$request->aboutsite_en;


      if (isset($request->imageabout)) {
            $ext = pathinfo($request->imageabout->getClientOriginalName(),
                PATHINFO_EXTENSION);
         if ($ext=="png" || $ext=="jpg" || $ext=="gif") {

                $new_au= uniqid() . "." . $ext;


                $path = $request->imageabout->move('uploads',$new_au);
            }
        }

        if(isset($new_au))
            if ($new_au != ''  or $new_au != null) {
                $admin->imageabout =$new_au;

            }
    


    $admin->update();
    Alert::success('نجاح العمية', '  تم التعديل بنجاح '); 
    return redirect()->back();


    }



 public function Changesettingadminpolicy(Request $request)
    {
    
 $this->validate($request, [
            'policy_ar'   => 'required',
            'policy_en' => 'required'
        ]);



    $admin=Admin::find(1);
 //     $encrypted = Crypt::encryptString('Hello world.');
 // return $decrypted = Crypt::decryptString($encrypted);


    $admin->policy_ar=$request->policy_ar;
    $admin->policy_en=$request->policy_en;


      if (isset($request->imagepolicy)) {
            $ext = pathinfo($request->imagepolicy->getClientOriginalName(),
                PATHINFO_EXTENSION);
         if ($ext=="png" || $ext=="jpg" || $ext=="gif") {

                $new_au= uniqid() . "." . $ext;


                $path = $request->imagepolicy->move('uploads',$new_au);
            }
        }

        if(isset($new_au))
            if ($new_au != ''  or $new_au != null) {
                $admin->imagepolicy =$new_au;

            }
    


    $admin->update();
    Alert::success('نجاح العمية', '  تم التعديل بنجاح '); 
    return redirect()->back();


    }
    
     public function Changesettingadminaboutpage()
    {
        $admin=Admin::find(1);

      return view('cpanel.policy',compact('admin'));


    }


      public function makasread()
       {


        foreach (\auth()->user()->unreadNotifications as $notification) {
    $notification->markAsRead();
        }

$not=\auth()->user()->Notifications;

      return view('cpanel.notification',compact('not'));
       }


           public function logout(Request $request)
    {

        Auth::guard('admin')->logout();

        $request->session()->flush();

        $request->session()->regenerate();

        return redirect()->guest(route( 'admin.login' ));
    }


}
