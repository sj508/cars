<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Validator;
use url;
use Auth;
use Session;
use Paginate;

class Carcontroller extends Controller
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

        $users = DB::table('make_car')->paginate(10);
        return view('carmake', ['users' => $users]);
       
    }

public function addcar()
    {
        
            $makecar = DB::table('make_car')->get();
            $bodycar = DB::table('car_body')->get();
            $fuelcar = DB::table('car_fuel')->get();
            $colorcar = DB::table('car_color')->get();
           
           
            return view('car_add',["makecar"  => $makecar, "bodycar"  => $bodycar, "fuelcar"  => $fuelcar, "colorcar"  => $colorcar]);
      

       
    }


 public function addcar_info(Request $request){
        
        
          if(empty($request->comfort)){
            $comfort = implode(array('comfort' => ''));
          }
          else{
            $comfort = implode(',', $request->comfort);
          }
          if(empty($request->entertainment)){
            $entertainment = implode(array('entertainment' => ''));
          }
          else{
            $entertainment = implode(',', $request->entertainment);
          }
          if(empty($request->safety)){
            $safety = implode(array('safety' => ''));
          }
          else{
            $safety = implode(',', $request->safety);
          }
          if(empty($request->seats)){
            $seats = implode(array('seats' => ''));
          }
          else{
            $seats = implode(',', $request->seats);
          }
          if(empty($request->windows)){
            $windows = implode(array('windows' => ''));
          }
          else{
            $windows = implode(',', $request->windows);
          }

          $destinationPath = base_path() . '/images/carpost/';
          $photo = $request->img; 
          $photo->move($destinationPath,  '1_'.time().$photo->getClientOriginalName());
          $photo_name = '1_'.time().$photo->getClientOriginalName();

         
              $input['make'] =$request->make;
              $input['model'] =$request->model;
              $input['car_year'] =$request->car_year;
              $input['condition'] =$request->condition;
              $input['body'] =$request->body;
              $input['mileage'] =$request->mileage;
              $input['fuel'] = $request->fuel;
              $input['engine'] = $request->engine;
              $input['exterior_color'] = $request->exterior_color;
              $input['interior_color'] = $request->interior_color;
              $input['registered'] = $request->registered;
              $input['vin_no'] = $request->vin_no;
              $input['comfort'] = $comfort;
              $input['entertainment'] = $entertainment;
              $input['safety'] = $safety;
              $input['seats'] = $seats;
              $input['windows'] = $windows;
              $input['price'] = $request->price;
              $input['image'] = $photo_name;

           $result = DB::table('car_information')->insert(array($input));
           $id = DB::getPdo()->lastInsertId();

     
        if($result){
                 
                 return redirect()->back()->with('message', 'Car Info add successfully .');
        }
        else{

                return redirect()->back()->with('message', 'Not Insert .');
        }
    }



    public function create(Request $request){
      /*
          $data = $request->name;
          Print_r($data); die;*/

         $customMessages = [
          'requireds' => 'Please fill .',
          
         ];


         $validator = Validator::make($request->all(), [
            'name'      => 'required',
       
            
        ],$customMessages);
         if ($validator->fails()) {
             return redirect()->back()->withErrors($validator);
        
        }else{
           $result = DB::table('make_car')->insert(
     array(
            'name'   =>   $request->name
     )
);
     }
        if($result){
             return redirect()->back()->with('message', 'Car Make has been Insert successfully .');
        }
        else{

            return redirect()->back()->with('message', 'Not Insert .');
        }
    }


   

 public function edit_carmake(Request $request)
    {
       /* $data = $request->id;
          Print_r($data); die;*/  
      /*  $user = User::find($id);*/
      $id = $request->id;
      $product = DB::table('make_car')->find($id);
      

     return view('edit_carmake',['product' => $product]);
              
    }


 public function post_edit_carmake(Request $request)
    {
       // $data = $request->input();
       //    Print_r($data); die;
            $id = $request->id;

           $input['name'] =$request->name;

           $result = DB::table('make_car')->where('id', $id)->update($input);

        if($result){
             return redirect()->back()->with('message', 'Car Make has been update successfully .');
        }
        else{

            return redirect()->back()->with('message', 'car make not update .');
        }
              
    }




 public function delete_carmake(Request $request)
    {
       /* $data = $request->id;
          Print_r($data); die;*/  
      /*  $user = User::find($id);*/
      $id = $request->id;
     $userdelete =DB::table('make_car')->where('id', $id)->delete();

    if($userdelete){
           return redirect()->back()->with('message', "Car has been Delete successfully");
           
    }else{
            return redirect()->back()->with('message', "Something is wrong,try again");
             
       }    
    }



  /*---------------------------CAR MODEL MANAGEMENT ------------------------------------------------*/


     public function car_model()
    {
        // echo "<pre>";
        // print_r($users_type); die;
       // $users = DB::table('users')->get();

        $users = DB::table('model_car')->paginate(10);

        $carmake = DB::table('make_car')->select('*')->get();

        return view('carmodel', ['users' => $users, 'carmake' => $carmake]);
       
    }



 public function createmodel(Request $request){
      /*
          $data = $request->name;
          Print_r($data); die;*/

         $customMessages = [
          'requireds' => 'Please fill .',
          
         ];
         $validator = Validator::make($request->all(), [
            'name'      => 'required',
            'carmake_id'      => 'required',
       
            
        ],$customMessages);
         if ($validator->fails()) {
             return redirect()->back()->withErrors($validator);
        
        }else{
          $input['carmake_id'] =$request->carmake_id;
          $input['name'] =$request->name;

           $result = DB::table('model_car')->insert(array($input));

     }
        if($result){
             return redirect()->back()->with('message', 'Car model has been Insert successfully .');
        }
        else{

            return redirect()->back()->with('message', 'Not Insert .');
        }
    }




 public function edit_carmodel(Request $request)
    {
       /* $data = $request->id;
          Print_r($data); die;*/  
      /*  $user = User::find($id);*/
      $id = $request->id;
      $product = DB::table('model_car')->find($id);
      $carmake = DB::table('make_car')->select('*')->get();       

     return view('edit_carmodel',['product' => $product, 'carmake' => $carmake]);
              
    }



public function post_edit_carmodel(Request $request)
    {
        /*$data = $request->input();
        Print_r($data); die;*/
            $id = $request->id;

             $input['name'] =$request->name;
            $input['carmake_id'] =$request->carmake_id;

           $result = DB::table('model_car')->where('id', $id)->update($input);

        if($result){
             return redirect()->back()->with('message', 'Car Model has been update successfully .');
        }
        else{

            return redirect()->back()->with('message', 'Car Model not update .');
        }
              
    }




 public function delete_carmodel(Request $request)
    {
       /* $data = $request->id;
          Print_r($data); die;*/  
      /*  $user = User::find($id);*/
      $id = $request->id;
     $userdelete =DB::table('model_car')->where('id', $id)->delete();

    if($userdelete){
           return redirect()->back()->with('message', "Car model has been Delete successfully");
           
    }else{
            return redirect()->back()->with('message', "Something is wrong,try again");
             
       }    
    }





  /*---------------------------CAR Body MANAGEMENT ------------------------------------------------*/


     public function car_body()
    {
        // echo "<pre>";
        // print_r($users_type); die;
       // $users = DB::table('users')->get();

        $users = DB::table('car_body')->paginate(10);

        return view('carbody', ['users' => $users]);
       
    }




public function createbody(Request $request){
      /*
          $data = $request->name;
          Print_r($data); die;*/

         $customMessages = [
          'requireds' => 'Please fill .',
          
         ];
         $validator = Validator::make($request->all(), [
            'name'      => 'required',
       
            
        ],$customMessages);
         if ($validator->fails()) {
             return redirect()->back()->withErrors($validator);
        
        }else{
          $input['name'] =$request->name;

           $result = DB::table('car_body')->insert(array($input));

     }
        if($result){
             return redirect()->back()->with('message', 'Car body has been Insert successfully .');
        }
        else{

            return redirect()->back()->with('message', 'Not Insert .');
        }
    }


 public function edit_carbody(Request $request)
    {
       /* $data = $request->id;
          Print_r($data); die;*/  
      /*  $user = User::find($id);*/
      $id = $request->id;
      $product = DB::table('car_body')->find($id);       

     return view('edit_carbody',['product' => $product]);
              
    }


public function post_edit_carbody(Request $request)
    {
        /*$data = $request->input();
        Print_r($data); die;*/
            $id = $request->id;

             $input['name'] =$request->name;

           $result = DB::table('car_body')->where('id', $id)->update($input);

        if($result){
             return redirect()->back()->with('message', 'Car Body has been update successfully .');
        }
        else{

            return redirect()->back()->with('message', 'Car body not update .');
        }
              
    }



     public function delete_carbody(Request $request)
    {
       /* $data = $request->id;
          Print_r($data); die;*/  
      /*  $user = User::find($id);*/
      $id = $request->id;
     $userdelete =DB::table('car_body')->where('id', $id)->delete();

    if($userdelete){
           return redirect()->back()->with('message', "Car body has been Delete successfully");
           
    }else{
            return redirect()->back()->with('message', "Something is wrong,try again");
             
       }    
    }




 /*---------------------------CAR Color MANAGEMENT ------------------------------------------------*/


    public function car_color(Request $request)
    {
        $users = DB::table('car_color')->paginate(10);
        return view('carcolor', ['users' => $users]);       
    }




public function createcolor(Request $request){
      /*
          $data = $request->name;
          Print_r($data); die;*/

         $customMessages = [
          'requireds' => 'Please fill .',
          
         ];
         $validator = Validator::make($request->all(), [
            'name'      => 'required',
       
            
        ],$customMessages);
         if ($validator->fails()) {
             return redirect()->back()->withErrors($validator);
        
        }else{
          $input['name'] =$request->name;

           $result = DB::table('car_color')->insert(array($input));

     }
        if($result){
             return redirect()->back()->with('message', 'Car Color has been Insert successfully .');
        }
        else{

            return redirect()->back()->with('message', 'Not Insert .');
        }
    }


 public function edit_carcolor(Request $request)
    {
       /* $data = $request->id;
          Print_r($data); die;*/  
      /*  $user = User::find($id);*/
      $id = $request->id;
      $product = DB::table('car_color')->find($id);       

     return view('edit_carcolor',['product' => $product]);
              
    }


public function post_edit_carcolor(Request $request)
    {
        /*$data = $request->input();
        Print_r($data); die;*/
            $id = $request->id;

             $input['name'] =$request->name;

           $result = DB::table('car_color')->where('id', $id)->update($input);

        if($result){
             return redirect()->back()->with('message', 'Car color has been update successfully .');
        }
        else{

            return redirect()->back()->with('message', 'Car color not update .');
        }
              
    }



     public function delete_carcolor(Request $request)
    {
       /* $data = $request->id;
          Print_r($data); die;*/  
      /*  $user = User::find($id);*/
      $id = $request->id;
     $userdelete =DB::table('car_color')->where('id', $id)->delete();

    if($userdelete){
           return redirect()->back()->with('message', "Car color has been Delete successfully");
           
    }else{
            return redirect()->back()->with('message', "Something is wrong,try again");
             
       }    
    }





/*---------------------------CAR fUEL MANAGEMENT ------------------------------------------------*/


     public function car_fuel()
    {
        // echo "<pre>";
        // print_r($users_type); die;
       // $users = DB::table('users')->get();

        $users = DB::table('car_fuel')->paginate(10);

        return view('carfuel', ['users' => $users]);
       
    }




public function createfuel(Request $request){
      /*
          $data = $request->name;
          Print_r($data); die;*/

         $customMessages = [
          'requireds' => 'Please fill .',
          
         ];
         $validator = Validator::make($request->all(), [
            'name'      => 'required',
       
            
        ],$customMessages);
         if ($validator->fails()) {
             return redirect()->back()->withErrors($validator);
        
        }else{
          $input['name'] =$request->name;

           $result = DB::table('car_fuel')->insert(array($input));

     }
        if($result){
             return redirect()->back()->with('message', 'Car Fuel has been Insert successfully .');
        }
        else{

            return redirect()->back()->with('message', 'Not Insert .');
        }
    }


 public function edit_carfuel(Request $request)
    {
       /* $data = $request->id;
          Print_r($data); die;*/  
      /*  $user = User::find($id);*/
      $id = $request->id;
      $product = DB::table('car_fuel')->find($id);       

     return view('edit_carfuel',['product' => $product]);
              
    }


public function post_edit_carfuel(Request $request)
    {
        /*$data = $request->input();
        Print_r($data); die;*/
            $id = $request->id;

             $input['name'] =$request->name;

           $result = DB::table('car_fuel')->where('id', $id)->update($input);

        if($result){
             return redirect()->back()->with('message', 'Car fuel has been update successfully .');
        }
        else{

            return redirect()->back()->with('message', 'Car fuel not update .');
        }
              
    }



     public function delete_carfuel(Request $request)
    {
       /* $data = $request->id;
          Print_r($data); die;*/  
      /*  $user = User::find($id);*/
      $id = $request->id;
     $userdelete =DB::table('car_fuel')->where('id', $id)->delete();

    if($userdelete){
           return redirect()->back()->with('message', "Car fuel has been Delete successfully");
           
    }else{
            return redirect()->back()->with('message', "Something is wrong,try again");
             
       }    
    }










}
