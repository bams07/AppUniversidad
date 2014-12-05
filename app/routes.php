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

Route::group(array('prefix'=>'admin'),function()
{

        Route::get('/','SearchController@showDashboard')->before('auth');

        // Rutas de inicio y cierre de session
        Route::get('login','LoginController@index',array('as' => 'login'))->before('guest');
        Route::post('login','LoginController@login');
        Route::get('logout','LoginController@logout',array('as' => 'logout' ))->before('auth');


        //Ruta de comentarios
        Route::get('students/comments/{idStudent}','StudentsController@getCommentsStudent');
        Route::get('students/comments/{idcomment}/edit','StudentsController@getComment');
        Route::delete('students/comments/{idcomment}','StudentsController@deleteComments');
        Route::put('students/comments/{idcomment}','StudentsController@updateComments');
        Route::post('students/comments','StudentsController@saveComments');


        // Rutas de mantenimiento
        Route::resource('users', 'UsersController');
        Route::resource('careers', 'CareersController');
        Route::resource('students', 'StudentsController');



});

Route::get('/',function()
{
    return View::make('front.index');
});


Route::get('searchTechnology/{technology}','searchController@searchTechnology');
Route::get('searchSkill/{skill}','searchController@searchSkill');
Route::get('show/{id}','searchController@show');



App::missing(function($exception)
{
    return Response::view('errors.404', array(), 404);
});