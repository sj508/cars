<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Validator;
use url;
use App\User;
use Auth;
use Session;

class Usercontroller extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');

  
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

       
        // echo "<pre>";
        // print_r($users_type); die;
       // $users = DB::table('users')->get();

        $users = DB::table('users')
            ->select('users.*')
            ->paginate(10);
       
        return view('user',['users' => $users]);
    }



 public function rate(Request $request)
    {
       
      $data = $request->all();

        $input['mileage'] = $request->mileage;
        $input['maintance'] = $request->maintance;
        $input['comfort'] = $request->comfort;
        $input['user_id'] = $request->user_id;
        $input['pro_id'] = $request->pro_id;

        $result = DB::table('rating')->insert(array($input));
        if($result){
             return redirect()->back()->with('message', 'rating successfully .');
        }
        else{

            return redirect()->back()->with('message', 'Something Wrong.');
        }

              
    }




 public function edit_profile(Request $request)
    {
       /* $data = $request->id;
          Print_r($data); die;*/  
      /*  $user = User::find($id);*/
      $id = $request->id;
      $user = DB::table('users')->find($id);
      
     return view('edit_profile',['users' => $user]);
              
    }



 public function post_edit_profile(Request $request)
    {
       /*$data = $request->input();
          Print_r($data); die;*/
     $id = $request->id;

            $destinationPath = base_path() . '/images/avatar/';
            $photo = $request->img;
            if(!empty($photo)){ 
            $photo->move($destinationPath,  '1_'.time().$photo->getClientOriginalName());
             $photo_name = '1_'.time().$photo->getClientOriginalName();

              $input['name'] =$request->name;
              $input['last_name'] =$request->last_name;
              $input['email'] =$request->email;
              $input['mobile'] =$request->mobile;
              $input['dob'] =$request->dob;
              $input['country'] =$request->country;
              $input['image'] =$photo_name;
              $input['gender'] =$request->gender;

           $result = DB::table('users')->where('id', $id)->update($input);

}
else{
             $input['name'] =$request->name;
              $input['last_name'] =$request->last_name;
              $input['email'] =$request->email;
              $input['mobile'] =$request->mobile;
              $input['dob'] =$request->dob;
               $input['country'] =$request->country;
              $input['gender'] =$request->gender;

         $result = DB::table('users')->where('id', $id)->update($input);
     }
        if($result){
             return redirect()->back()->with('message', 'User has been update successfully .');
        }
        else{

            return redirect()->back()->with('message', 'User not update .');
        }
              
    }


public function edit_password(Request $request)
    {
       /* $data = $request->input();
          Print_r($data); die;*/ 
           $id = $request->id;
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
          $Hpassword = bcrypt($request->password);
          $doneUpdata = DB::table('users')->where('id',$id)->update(['password'=>$Hpassword]);
          if($doneUpdata){
           return redirect()->back()->with('message', "Password has been changed");
           
          }else{
            return redirect()->back()->with('message', "Something is wrong,try again");
             
          }
        }
       
              
    }



 public function delete_user(Request $request)
    {
       /* $data = $request->id;
          Print_r($data); die;*/  
      /*  $user = User::find($id);*/
      $id = $request->id;
     $userdelete =DB::table('users')->where('id', $id)->delete();

    if($userdelete){
           return redirect()->back()->with('message', "User has been Delete successfully");
           
    }else{
            return redirect()->back()->with('message', "Something is wrong,try again");
             
       }    
    }












}
