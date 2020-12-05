<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Validator;
use url;
use Auth;
use Session;
use Paginate;

class Registrationcontroller extends Controller
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

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
          
        return view('web.home');
       
    }


 public function post_register(Request $request){
       /*echo"<pre>"; 
        $data = $request->input();
           Print_r($data); die;*/
     
            
            $customMessages = [
          'required' => 'Please fill passwod.',
          'required' => 'Please confirm fill passwod.',
          'same' => 'Confirm password is not matched.'
         ];


         $validator = Validator::make($request->all(), [
            'password'      => 'required|min:6',
            'cnf_password'      => 'required|same:password',
            
        ],$customMessages);
         if ($validator->fails()) {
             return redirect()->back()->withErrors($validator);
        
        }else{
              $month  = $request->month;
              $date   = $request->day;
              $year   = $request->year;
              $dob    =   $year . "-" . $month . "-" . $date;
              $Hpassword = bcrypt($request->password);

              $input['name'] =$request->name;
              $input['last_name'] =$request->last_name;
              $input['user_name'] =$request->user_name;
              $input['password'] =$Hpassword;
              $input['email'] =$request->email;
              $input['mobile'] =$request->mobile;
              $input['dob'] = $dob;
              $input['country'] = $request->country;
              $input['gender'] = $request->gender;
              /* echo"<pre>";             
              Print_r($input); die;*/

           $result = DB::table('users')->insert(array($input));
        
   }

     
        if($result){
                 return redirect()->back()->with('message', 'Register Info add successfully .');
          

        }
        else{

            return redirect()->back()->with('message', 'Not Insert .');
        }
    }


    









}
