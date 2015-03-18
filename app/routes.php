<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/

Route::get('/', array(
'before' => 'auth',
	function()
{
    return View::make('PeaksList');
}));


Route::get('/register', 'RegisterController@showRegister');
Route::post('/register', 'RegisterController@doRegister');

Route::get('/login', function()
{
    return View::make('login');
});


Route::post('/login',function()
{
	$credentials=Input::only('username','password');
	
	if (Auth::attempt($credentials)){
		return Redirect::intended('/');
	} 
	
		return Redirect::to('login');
});



Route::get('/logout', function()
{	
	Auth::logout();
    return View::make('logout');
});



// API ROUTES ==================================  
Route::group(array('prefix' => 'api'), function() {
   
    Route::resource('peaks', 'PeakController', 
        array('only' => array('index', 'store', 'destroy')));
  
});



