<?php

use App\Cook;
use Illuminate\Http\Request;

Route::get('/', function () {
    return view('welcome');
});
Auth::routes();

// Route::get("/jsonMessage", "MessagesController@json");
Route::get("/jsonComment", "CooksController@json");

Route::get('auth/login', 'Auth\SocialController@authLogin');
Route::get('auth/login/facebook', 'Auth\SocialController@facebookRedirect');
Route::get('auth/facebook/callback', 'Auth\SocialController@facebookCallback');

Route::group(['middleware' => 'auth'], function () {
    // cooks
    Route::get('/cooks', 'CooksController@index');
    Route::post('/cooks', 'CooksController@good');
    Route::get('/cooks/create', 'CooksController@create');
    Route::post('/cooks/store', 'CooksController@store');
    Route::get('/cooks/show/{cooks}', 'CooksController@show');
    Route::post('/cooks/show/{cooks}', 'CooksController@comment');
    Route::get('/cooks/edit/{cooks}', 'CooksController@edit');
    Route::put('/cooks/update', 'CooksController@update');
    Route::delete('/cook/{cook}', 'CooksController@destroy');

    // users
    Route::get('/users', 'UsersController@index');
    Route::get('/users/show/{users}', 'UsersController@show');
    Route::get('/users/edit/{users}', 'UsersController@edit');
    Route::put('/users/update', 'UsersController@update');
    Route::delete('/user/{user}', 'UsersController@destroy');

    // // conversations
    Route::get('/conversations', 'ConversationsController@index');
    Route::post('/conversations/store', 'ConversationsController@store');

    // // messages
    Route::resource(
        'conversations.messages',
        'MessagesController',
        ['only' => ['index', 'store']]
    );

    // home
    Route::get('/home', 'HomeController@index')->name('home');
});
