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

Route::get('/', 'Webfront@index');





Route::group(['prefix' => 'backend','middleware' => 'checklogin'], function () {


    // DASHBOARD
    Route::get('dashboard', 'DashboardController@index');
    // PENYAKIT
    Route::get('penyakit', 'PenyakitController@index');
    Route::get('penyakit/search', 'PenyakitController@search');
    Route::get('penyakit/searchproses', 'PenyakitController@searchproses');
    Route::get('penyakit/add', 'PenyakitController@add');
    Route::get('penyakit/{id}/update', 'PenyakitController@update');
    Route::get('penyakit/{id}/delete', 'PenyakitController@delete');
    Route::post('penyakit/addproses', 'PenyakitController@addproses');
    Route::post('penyakit/updateproses', 'PenyakitController@updateproses');
    // GEJALA
    Route::get('gejala', 'GejalaController@index');
    Route::get('gejala/add','GejalaController@add');
    Route::get('gejala/{id}/update', 'GejalaController@update');
    Route::get('gejala/{id}/deleted', 'GejalaController@deleted');
    Route::post('gejala/addproses','GejalaController@addproses');
    Route::post('gejala/updateproses','GejalaController@updateproses');
    // PENYEBAB
    Route::get('penyebab', 'PenyebabController@index');
      // SOLUSI
    Route::get('solusi', 'SolusiController@index');
    Route::get('solusi/add', 'SolusiController@add');
    Route::get('solusi/{id}/update', 'SolusiController@update');
    Route::get('solusi/{id}/deleted', 'SolusiController@deleted');
    Route::post('solusi/addproses', 'SolusiController@addproses');
    Route::post('solusi/updateproses', 'SolusiController@updateproses');

    // ACCOUNT
    Route::get('account', 'admin@listdata');
    Route::get('account/add', 'admin@add');
    Route::get('account/{id}/update', 'admin@update');
    Route::get('account/{id}/delete', 'admin@delete');
    Route::post('account/addproses','admin@addproses');
    Route::post('account/updateproses','admin@updateproses');
    Route::get('profile', 'admin@profile');

});


Route::group(['prefix' => 'administrator'], function () {
    Route::get('/', function () {
        return view('admin.login');
    });
    Route::get('/login', function () {
        return view('admin.login');
    });
    Route::post('/login','WelcomeController@cekLogin');
    Route::get('/logout','WelcomeController@logout');

    
});


Route::group(['prefix' => 'membership'], function () {
    Auth::routes();
    Route::get('/', 'HomeController@index')->name('home');
    Route::get('/home', 'HomeController@index')->name('home');
    Route::get('/diagnosa', 'HomeController@diagnosa')->name('diagnosa');
    Route::get('/hasil-diagnosa', 'HomeController@diagnosa')->name('hasil-diagnosa');
    Route::get('/profil', 'HomeController@profil')->name('profil');
});