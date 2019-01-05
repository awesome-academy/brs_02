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
Route::namespace('Bookreview')->group(function () {
    Route::get('/', [
        'uses' => 'Index@index',
        'as' => 'bookreview.index.index'
    ]);
});
Route::namespace('Admin')->prefix('admin')->group(function () {
    Route::get('/', [
        'uses' => 'Index@index',
        'as' => 'admin.index.index'
    ])->middleware('auth');
    Route::get('/cat', [
        'uses' => 'CategoryController@index',
        'as' => 'admin.cat.index'
    ])->middleware('auth');
    Route::get('/login',[
        'uses' => 'Login@getLogin',
        'as' => 'login',
    ]);
    Route::post('/login',[
        'uses' => 'Login@postLogin',
        'as' => 'admin.login.index',
    ]);
    Route::get('logout',[
        'uses'=>'Login@logOut',
        'as'=>'admin.logout'
    ])->middleware('auth');

    Route::resource('cat', 'Category')->middleware('auth');

    Route::resource('book', 'Book')->middleware('auth');
});
