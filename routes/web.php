<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

/*Route::get('/', function () {
    return view('web.home');
});*/

Route::get('/admin', function () {
    return view('auth.login');
});


Route::get('home','Homecontroller@index');
Route::get('/admin/logout', 'Homecontroller@getLogout');
Auth::routes();

Route::get('/user','Usercontroller@index');

Route::get('/edit_profile/{id}','Usercontroller@edit_profile');
Route::post('/post_edit_profile','Usercontroller@post_edit_profile');

Route::post('/edit_password','Usercontroller@edit_password');
Route::get('/delete_user/{id}','Usercontroller@delete_user');


Route::get('/car_make','Carcontroller@index');
Route::post('/create','Carcontroller@create');
Route::get('/edit_carmake/{id}','Carcontroller@edit_carmake');
Route::post('/post_edit_carmake','Carcontroller@post_edit_carmake');
Route::get('/delete_carmake/{id}','Carcontroller@delete_carmake');



Route::get('/car_model','Carcontroller@car_model');
Route::post('/create_model','Carcontroller@createmodel');
Route::get('/edit_carmodel/{id}','Carcontroller@edit_carmodel');
Route::post('/post_edit_carmodel','Carcontroller@post_edit_carmodel');
Route::get('/delete_carmodel/{id}','Carcontroller@delete_carmodel');


Route::get('/car_body','Carcontroller@car_body');
Route::post('/create_body','Carcontroller@createbody');
Route::get('/edit_carbody/{id}','Carcontroller@edit_carbody');
Route::post('/post_edit_carbody','Carcontroller@post_edit_carbody');
Route::get('/delete_carbody/{id}','Carcontroller@delete_carbody');


Route::get('/car_color','Carcontroller@car_color');
Route::post('/create_color','Carcontroller@createcolor');
Route::get('/edit_carcolor/{id}','Carcontroller@edit_carcolor');
Route::post('/post_edit_carcolor','Carcontroller@post_edit_carcolor');
Route::get('/delete_carcolor/{id}','Carcontroller@delete_carcolor');



Route::get('/car_fuel','Carcontroller@car_fuel');
Route::post('/create_fuel','Carcontroller@createfuel');
Route::get('/edit_carfuel/{id}','Carcontroller@edit_carfuel');
Route::post('/post_edit_carfuel','Carcontroller@post_edit_carfuel');
Route::get('/delete_carfuel/{id}','Carcontroller@delete_carfuel');

 Route::get('/addcars','Carcontroller@addcar'); 
 Route::post('/addcar_info','Carcontroller@addcar_info');

  Route::post('/rate','Usercontroller@rate');



            /* ----------------------- Website ----------------------------------------*/
 Route::group(['middleware' => ['customer']], function () {
});

 Route::get('/','Webcontroller@index');  
 
 Route::get('/addcar','Webcontroller@addcar'); 
  Route::post('/dropdownmodel','Webcontroller@dropdownmodel');
  Route::post('/dropdownmodels','Webcontroller@dropdownmodels');

Route::get('/user_login','Webcontroller@showlogin');  
Route::get('/registration','Webcontroller@showregistration'); 
Route::post('/register','Registrationcontroller@post_register');
Route::post('/users_login','Loginusercontroller@do_login');
Route::get('/userlogout','Webcontroller@userlogout');

Route::get('/deatil/{id}','Detailcontroller@index');

Route::get('/rest_password/{code}','Forgotcontroller@rest_password');
Route::post('/reset_password','Forgotcontroller@rest_password_set');


 



