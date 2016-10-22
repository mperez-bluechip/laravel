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


use App\User;


Route::get('/', function()
{
	return View::make('welcome');
});

Route::get('/register', function()
{
    return View::make('register');
});

Route::post('/register', function()
{
    $user = new User;
    $user->email = Input::get('email');
    $user->username = Input::get('username');
    $user->password = Hash::make(Input::get('password'));
    $user->save();
     $theEmail = Input::get('email');
    return View::make('thanks')->with('theEmail', $theEmail);
});

Route::get('/login', function()
{
    return View::make('login');
});

//Route::post('login', function(ServerRequestInterface $request)
Route::post('login', 'Auth\AuthController@postLogin', function(ServerRequestInterface $request)
{
$credentials = $request->only('username', 'password');
if (Auth::attempt($credentials)) {
	return Redirect::intended('/');
}
  return Redirect::to('login');
});

Route::get('/logout', function()
{
    Auth::logout();
    return View::make('logout');
});

Route::get('spotlight', function()
{
    return View::make('spotlight');
})->middleware('auth');
