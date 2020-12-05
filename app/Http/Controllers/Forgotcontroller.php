<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Validator;
use url;
use App\User;
use Auth;
use Session;
use Paginate;
use Mail;


class Forgotcontroller extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
 /*   public function __construct()
    {
        $this->middleware('auth'); 

    }*/

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
 
     public function forgot_password(){

          return view('web.forgot');
       
    }

    
     public function password(Request $request){

       /* $data = $request->input();
        print_r($data); die;*/
        $email = $request->email; 
        //$user = User::whereEmail($request->email)->first();
        $user = DB::table('users')->where('email', $email)->first();
        if($user == null){
          return redirect()->back()->with('message', 'Email not exist .');
        }

            DB::table('password_resets')->insert([
            'email' => $request->email,
            'token' => str_random(60)
        ]);

            $tokenData = DB::table('password_resets')
            ->where('email', $request->email)->first();

        if ($this->sendResetEmail($request->email, $tokenData->token)) {

            return redirect()->back()->with('message', 'Rest Link send to your email id.');

        } else {
        
         return redirect()->back()->withErrors('message', 'A Network Error occurred. Please try again.');
        }
  
       
    }


     public function sendResetEmail($user,$code){

              $userdetail = DB::table('users')->where('email', $user)->select('name')->first();
              Mail::send('web.email',['user' => $user, 'code' => $code, 'userdetail' => $userdetail],
              function($message) use ($user){
                $message->to($user);
                $message->subject("Rest password.");
              });

     }


     public function rest_password(Request $request){
                $code = $request->code;
                $userdetail = DB::table('password_resets')->where('token', $code)->select('*')->first();
               
            return view('web.rest_password',['tblemail'=>$userdetail->email]);

     }
     public function rest_password_set(Request $request){
               $Hpassword = bcrypt($request->web);
                $result = DB::table('users')
               ->where('email', $request->email)  // find your user by their email
              ->limit(1)  // optional - to ensure only one record is updated.
              ->update(array('password' => $Hpassword));
              if ($result) {
                $userdelete =DB::table('password_resets')->where('email', $request->email)->delete();
                  return redirect('user_login')->with('message', 'Rest Password Successfully.');
              }else{
                  return redirect()->back()->with('message', 'Rest Not Password reset.');  
              }
                

     }












}
