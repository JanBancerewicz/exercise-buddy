<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Models\Task;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::namespace('Web')->group(function()
{

    Route::get('/', 'SiteController@index')->name('index');
    
    Route::get('/db-test', 'SiteController@getall');
    Route::get('/db-test2', function(){
    
        return dd(DB::connection()->getPdo());
    });

    


    Route::prefix('/tasks')->group(function(){

        //index
        Route::get('/','TaskController@index')->name('tasks.index');
    
        //add
        Route::get('/add','TaskController@add')->name('tasks.add');
    
        //store
        Route::post('/store','TaskController@store')->name('tasks.store');
    
        //{task}
        Route::get('/{task}','TaskController@show')->name('tasks.show');
    
        //{task}/edit
        Route::get('/{task}/edit','TaskController@edit')->name('tasks.edit');
    
        //{task}
        Route::put('/{task}','TaskController@update')->name('tasks.update');
    
        //{task}
        Route::delete('/{task}','TaskController@delete')->name('tasks.delete');
    });


});






Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
