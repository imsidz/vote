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

Auth::routes();

Route::get('/', [
	'uses'	=>	'HomeController@index',
	'as'	=>	'home.index'
]);

Route::post('option/{id}', [
    'uses'  =>  'HomeController@votepost',
    'as'    =>  'vote.post'
]);

Route::prefix('admin')->group(function () {
    Route::get('/', [
    	'uses'	=>	'AdminController@index',
    	'as'	=>	'admin.index'
    ]);

    Route::get('question', [
    	'uses'	=>	'AdminController@questionindex',
    	'as'	=>	'admin.question.index'
    ]);

    Route::post('question', [
    	'uses'	=>	'AdminController@questionpost',
    	'as'	=>	'admin.question.post'
    ]);


    Route::put('question/{id}', [
        'uses'  =>  'AdminController@questionedit',
        'as'    =>  'admin.question.edit'
    ]);

    Route::delete('question/{id}', [
        'uses'  =>  'AdminController@questiondelete',
        'as'    =>  'admin.question.delete'
    ]);

    Route::post('option/{id}', [
        'uses'  =>  'AdminController@optionpost',
        'as'    =>  'admin.option.post'
    ]);

    Route::delete('option/{id}', [
        'uses'  =>  'AdminController@optiondelete',
        'as'    =>  'admin.option.delete'
    ]);

    Route::get('users', [
        'uses'  =>  'AdminController@usersindex',
        'as'    =>  'admin.users.index'
    ]);

    Route::post('users/{id}', [
        'uses'  =>  'AdminController@userdelete',
        'as'    =>  'admin.user.delete'
    ]);
});
