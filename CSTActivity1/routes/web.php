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
    
    Route::get('/login', function () {
        return view('login');
    });
        
        Route::get('logout', function () {
            return view('login');
        });
            
            Route::get('/reg', function() {
                return view('register');
            });
                
                Route::get('/profile',function(){
                    return view('profile');
                });
                    
                    Route::post('Register', 'UserController@index');
                    
                    Route::post('login', 'UserController@login');
                    
                    
                    //Admin routes
                    Route::get('users','AdminController@ManageUsers');
                    
                    Route::post('deleteUser','AdminController@deleteUser');
                    
                    Route::post('suspendUser','AdminController@suspendUser');
                    
                    Route::get('userProfile','AdminController@viewUser');
                    Route::post('userProfile','AdminController@viewUser');
                    
                    Route::get('job','JobController@viewJob');
                    Route::post('job','JobController@viewJob');
                    
                    Route::get('education','EducationController@viewEducation');
                    Route::post('education','EducationController@viewEducation');