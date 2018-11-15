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

Route::get('/translations', 'TranslationController@index')->name('trans');
Route::get('/translations/{translation}', 'TranslationController@show')->name('trans_detail');

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

    Route::get('/forms/create', 'WordFormController@create');
    Route::post('/forms', 'WordFormController@store');

    Route::get('/translations/create', 'TranslationController@create');
    Route::post('/translations', 'TranslationController@store');
});

Route::prefix('admin')->group(function () {
//    Route::get('/', 'HomeController@adminIndex');
    Route::get('words', 'WordController@adminWordsIndex');
    Route::get('words/{word}', 'WordController@adminWordShow')->name('admin_word_detail');
    Route::get('users', 'WordController@adminUsersIndex');
    Route::get('users/{user}', 'WordController@adminUserShow')->name('admin_user_detail');;
});
//Route::post('/words/{word}/comments', 'CommentsController@store');

Route::get('/register', 'RegistrationController@create');
Route::post('/register', 'RegistrationController@store');

Route::get('/login', 'SessionsController@create')->name('login');
Route::post('/login', 'SessionsController@store');
Route::get('/logout', 'SessionsController@destroy');
