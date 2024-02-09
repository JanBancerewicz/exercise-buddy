<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Models\Exercise;
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

    


    Route::prefix('/exercises')->group(function(){

        //index
        Route::get('/','ExerciseController@index')->name('exercises.index');
    
        //add
        Route::get('/add','ExerciseController@add')->name('exercises.add');
    
        //store
        Route::post('/store','ExerciseController@store')->name('exercises.store');
    
        //{exercise}
        Route::get('/{exercise}','ExerciseController@show')->name('exercises.show');
    
        //{exercise}/edit
        Route::get('/{exercise}/edit','ExerciseController@edit')->name('exercises.edit');
    
        //{exercise}
        Route::put('/{exercise}','ExerciseController@update')->name('exercises.update');
    
        //{exercise}
        Route::delete('/{exercise}','ExerciseController@delete')->name('exercises.delete');

        //setall
        Route::get('/setall/{param}','ExerciseController@setall')->name('exercises.setall');
    });


});






Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
