<?php
//app/Http/Controllers/Pages/UserController.php

namespace App\Http\Controllers\Pages;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use App\Users;

class UserController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        
    }

    public function loginForm(Request $request)
    {
        
        return View::make('login');

    }
    

    public function authenticateUser(Request $request)
    {

        $this->validate($request,['email'=>'required', 'password'=>'required']);
        $email = $request->input('email');
        $user = Users::where('email',$email)->first();
        
        if($user !=null && Hash::check($request->input('password'),$user->password)){
           
            $apikey = base64_encode(str_random(40));
            Users::where('email', $email)->update(['api_key' => $apikey]);
            
            return response()->json(['status' => 'success','api_key' => $apikey],200);
        }

        return response()->json(['status'=>'failed'], 401);
    }


    private function validatePassword($password)
    {       
     
       if( preg_match("(^(?=.*[a-z])(?=.*[A-Z])(?=.*\d).+$)",$password) !=0){  
            if(strlen($password)>7){
                return true;
            }
        }
        return false;
    }

    
    public function registerUser(Request $request)
    {

        $this->validate($request,['email' => 'required','codas_account' => 'required',
                                  'business' => 'required','password' => 'required' ]);

        if ($this->validatePassword($request->input('password'))==false){
            
            return response()->json(['status' => 'failed','error' => 'Password is too weak'],400);
        
        }
        
        $password = Hash::make($request->input('password'));
        $user = new Users;
        $user->email = $request->input('email');
        $user->codas_account = $request->input('codas_account');
        $user->business = $request->input('business');
        $user->password = $password;
        $user->save();

        return response()->json(['status'=>'success', 'message' => 'Account created successfully'],200);
    }


}