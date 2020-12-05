<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Validator;
use url;
use Auth;
use Session;
use Paginate;

class Webcontroller extends Controller
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
   public function index()
    {
        $color = DB::table('car_color')->get();
        $makecar = DB::table('make_car')->get();
        $mileage = DB::table('car_information')->select('mileage')
            ->groupBy('mileage')
            ->get();
        $carlist = DB::table('car_information')->join('make_car', 'make_car.id', '=', 'car_information.make')
            ->join('model_car', 'model_car.id', '=', 'car_information.model')
            ->join('car_fuel', 'car_fuel.id', '=', 'car_information.fuel')
            ->select('car_information.*', 'make_car.name as make_name', 'model_car.name as model_name', 'car_fuel.name as fuel_name')
            ->get();
    
        return view('web.home', ['carlist' => $carlist, "makecar" => $makecar, 'mileage' => $mileage, 'color' =>  $color]);

    

    }


  public function dropdownmodel(Request $request)
    {
          $cat_id = $request->pid;
          $modelcars = DB::table('model_car')->where('carmake_id', $cat_id)->get();
         return response()->json($modelcars);
         
    }
    public function dropdownmodels(Request $request)
    {
        $cat_id = $request->pid;
        $modelcars = DB::table('model_bike')->where('carmake_id', $cat_id)->get();
        return response()
            ->json($modelcars);

    }



public function showlogin(){
           
          return view('web.login');
       
    }

 public function showregistration(){

        $country = DB::table('country')->get();
       /* echo"<pre>";
        print_r($country); die;*/
          return view('web.registration',["country"  => $country]);
       
    }


  
    public function userlogout()
    {
        
         Auth::logout();
        auth()->guard('customer')->logout();
        return redirect('/')->with('message', 'Loout successfully.'); 

    }











}
