<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Input;
use Illuminate\Http\Request;
use App\User;
use url;
use Validator;
use Auth;
use Session;
use Hash;



class Loginusercontroller extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
  /* public function __construct()
    {
        $this->middleware('auth'); 

    }*/

    //use AuthenticatesUsers;

     protected $redirectTo = '/';
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */


     public function do_login(Request $request)
    { 
       /*echo"<pre>"; 
        $data = $request->input();
        Print_r($data); die;*/
       
        $customMessages = [
          'required' => 'Please fill email id.',
          'password.required' => 'Please fill password.',
          
         ];


         $validator = Validator::make($request->all(), [
            'email'      => 'required',
            'password'      => 'required|min:6',
            
        ],$customMessages);
         if ($validator->fails()) {
             return redirect()->back()->withErrors($validator);
        
        }else{
           
        $customer_auth = auth()->guard('customer');
        $credentials = array('email' => Input::get('email'), 'password' => Input::get('password'), 'user_type' => 1);
       
        if ($customer_auth->attempt($credentials)) {
            
                return redirect('/')->with('message', 'Login successfully.'); 
          }else{  
             
               return redirect()->back()->with('message', 'Invalid email or password. Try again! .');           
            } 

        }
            
    }

  


public function __construct()
    {
        $this->middleware('guest:customer')->except('logout');
    }









}
