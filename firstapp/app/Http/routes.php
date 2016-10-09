<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', function () {
  // Schema::create('art', function($newTable){
  //   $newTable->increments('id');
  //   $newTable->string('artist');
  //   $newTable->string('title', 500);
  //   $newTable->text('description');
  //   $newTable->date('created');
  //   $newTable->date('exhibition_date');
  //   $newTable->timestamps();
  // });
  Schema::table('art', function($newTable){
    $newTable->boolean('alumni');
    $newTable->dropColumn('exhibition_date');
  });
    return View::make('welcome');
});

Route::get('about', function(){
  return 'About content goes here.';
});

Route::get('about/directions', function(){
  return 'Directions go here.';
});

Route::get('about/{theSubject}', function($thes){
  return $theSubject.' content goes here.';
});

Route::get('about/classes/{theSubject}', function($theSubject){
  return "Content about {$theSubject} classes goes here.";
});
