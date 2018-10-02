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

Route::get('/', 'HomeController@index')->name('home');
Route::get('/words', 'WordController@index')->name('dict');
Route::get('/words/{word}', 'WordController@show')->name('word_detail');
//Route::get('/word/{word}/updates', 'WordUpdateController@index');

Route::prefix('user')->group(function () {
    Route::get('/words/create', 'WordController@create');
    Route::post('/words', 'WordController@store');

    Route::get('/word/{word}/updates/create', 'WordUpdateController@create');
//    Route::get('/updates/{update}/create', 'WordUpdateController@create');
    Route::post('/word/{word}/updates', 'WordUpdateController@store');
    Route::get('/updates/{update}/edit', 'WordUpdateController@edit');
    Route::put('/updates/{update}', 'WordUpdateController@update');
    Route::delete('/updates/{update}', 'WordUpdateController@destroy');

    Route::post('/vote/{update}', 'VoteController@vote');
});

//Route::post('/words/{word}/comments', 'CommentsController@store');

Route::get('/register', 'RegistrationController@create');
Route::post('/register', 'RegistrationController@store');

Route::get('/login', 'SessionsController@create')->name('login');
Route::post('/login', 'SessionsController@store');
Route::get('/logout', 'SessionsController@destroy');
