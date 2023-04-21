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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/example', function () {
    return view('example');
});


Route::group(['middleware'=> 'auth'], function(){
    Route::get('/mypage', 'MypageController@mypage')->name('mypage');
    Route::get('/prof/{id}/edit', 'MypageController@profEdit')->name('prof_edit');
    Route::post('/prof/{id}/edit', 'MypageController@profUpdate')->name('prof_update');
    Route::get('/logout', 'MypageController@logout')->name('logout');
    Route::get('/{id}/withdrow', 'MypageController@withdrow')->name('withdrow');
    Route::post('/{id}/withdrow/delete', 'MypageController@deleteUser')->name('delete_user');

    Route::get('/newFood', 'FoodController@new')->name('new_food');
    Route::post('/newFood', 'FoodController@create')->name('create_food');
    Route::get('/{id}/foodEdit', 'FoodController@edit')->name('edit_food');
    Route::post('/{id}/foodEdit', 'FoodController@update')->name('update_food');
    Route::post('/{id}/foodEdit/delete', 'FoodController@delete')->name('delete_food');
    Route::get('/index/food', 'FoodController@index')->name('index_food');

    Route::get('/newPee', 'PeeController@new')->name('new_pee');
    Route::post('/newPee', 'PeeController@create')->name('create_pee');
    Route::get('/{id}/peeEdit', 'PeeController@edit')->name('edit_pee');
    Route::post('/{id}/peeEdit', 'PeeController@update')->name('update_pee');
    Route::post('/{id}/peeEdit/delete', 'PeeController@delete')->name('delete_pee');
    Route::get('/index/pee', 'PeeController@index')->name('index_pee');

    Route::get('/newPoof', 'PoofController@new')->name('new_poof');
    Route::post('/newPoof', 'PoofController@create')->name('create_poof');
    Route::get('/{id}/poofEdit', 'PoofController@edit')->name('edit_poof');
    Route::post('/{id}/poofEdit', 'PoofController@update')->name('update_poof');
    Route::post('/{id}/poofEdit/delete', 'PoofController@delete')->name('delete_poof');
    Route::get('/index/poof', 'PoofController@index')->name('index_poof');
});





