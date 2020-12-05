<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Validator;
use url;
use Auth;
use Session;
use Paginate;

class Detailcontroller extends Controller
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
    public function index(Request $request)
    {
         $id = $request->id;
      // $detail = DB::table('car_information')->where('id', $id)->first();
            $detail = DB::table('car_information')->where('car_information.id', $id)
            ->join('make_car', 'make_car.id', '=', 'car_information.make')
            ->join('model_car', 'model_car.id', '=', 'car_information.model')
            ->join('car_fuel', 'car_fuel.id', '=', 'car_information.fuel')
            ->join('car_body', 'car_body.id', '=', 'car_information.body')
            ->join('car_color', 'car_color.id', '=', 'car_information.exterior_color')
            ->join('car_color as c', 'c.id', '=', 'car_information.interior_color')
            ->select('car_information.*', 'make_car.name as make_name', 'model_car.name as model_name', 'car_fuel.name as fuel_name', 'car_body.name as body_name', 'car_color.name as exterior_name', 'c.name as interior_name')
            ->get();
            $rating = "";
            
            if($user = Auth::guard('customer')->user()){

                $rating = DB::table('rating')->where('user_id', $user->id)->where('pro_id', $id)->select('mileage')->get();
            }
        
        return view('web.detail', ['detail' => $detail, 'rating' => $rating]);
       
    }


}
