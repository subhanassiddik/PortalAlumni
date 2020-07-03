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
Route::get('/user/logout', 'Auth\LoginController@logoutUser')->name('user.logout');

Route::group(['prefix' => 'admin','as'=>'admin.'], function () {
    Route::get('/', 'AdminController@index')->name('home');    
    Route::group(['namespace' => 'AuthAdmin'], function () {
        Route::post('/login', 'LoginController@login')->name('login.submit');    
        Route::get('/login', 'LoginController@showLoginForm')->name('login');
        route::get('/logout','LoginController@logout')->name('logout');    
    });
});

Route::group(['prefix' => 'company','as'=>'company.'], function () {
    Route::get('/', 'CompanyController@index')->name('home');    
    Route::group(['namespace' => 'AuthCompany'], function () {
        Route::post('/login', 'LoginController@login')->name('login.submit');    
        Route::get('/login', 'LoginController@showLoginForm')->name('login');
        route::get('/logout','LoginController@logout')->name('logout');    
    });
});


Route::get('/','VacancyController@index');
Route::get('vacancies','VacancyController@create');
Route::post('vacancies','VacancyController@store');
Route::get('vacancies/{slug}','VacancyController@show');
Route::get('vacancies/{slug}/edit','VacancyController@edit');
Route::patch('vacancies/{slug}','VacancyController@update');
Route::delete('vacancies/{id}', 'VacancyController@destroy');
Route::get('vacancies/filter/{tag}','VacancyController@filter');

Route::post('vacancies/upload', 'VacancyController@upload')->name('vacancy.upload');



