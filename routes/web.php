<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

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
// Route::get('/login', 'AuthController@index');
// Route::post('/login/auth', ['as'=> 'login.session', 'uses'=>'AuthController@login']);
// Route::get('/logout', ['as'=> 'logout', 'uses'=>'AuthController@login']);


Route::prefix('admin')
    ->group(function () {
    Route::get('/dashboard', ['as'=> 'dashboard', 'uses'=>'DashboardController@index']);

    Route::get('/detail/{id}', ['as'=> 'detail', 'uses'=>'DashboardController@detail']);

    
    Route::get('/masyarakat', ['as'=> 'masyarakat.daftar', 'uses'=>'MasyarakatController@data']);
    Route::get('/masyarakat/approve', ['as'=> 'masyarakat.approve', 'uses'=>'MasyarakatController@dataApprove']);
    Route::get('/masyarakat/peding', ['as'=> 'masyarakat.pending', 'uses'=>'MasyarakatController@dataPending']);
    
    Route::get('/masyarakat/create', ['as'=> 'masyarakat.create', 'uses'=>'MasyarakatController@create']);
    Route::post('/masyarakat/store',['as' => 'masyarakat.store', 'uses' => 'MasyarakatController@store']);
    
    // Route::get('/sekolah/smp', ['as'=> 'sekolah.smp', 'uses'=>'App\Http\Controllers\SekolahController@sekolahSmp']);
    // Route::get('/sekolah/sma', ['as'=> 'sekolah.sma', 'uses'=>'App\Http\Controllers\SekolahController@sekolahSma']);
    // Route::get('/sekolah/smk', ['as'=> 'sekolah.smk', 'uses'=>'App\Http\Controllers\SekolahController@sekolahSmk']);
    // Route::get('/sekolah/edit/{id}', ['as'=> 'sekolah.edit', 'uses'=>'App\Http\Controllers\SekolahController@edit']);
    // Route::patch('/sekolah/update/{id}', ['as'=> 'sekolah.update', 'uses'=>'App\Http\Controllers\SekolahController@update']);
    // Route::get('/sekolah/destroy/{id}', ['as'=> 'kecamatan.destroy', 'uses'=>'App\Http\Controllers\KecamatanController@destroy']);
        
});

Auth::routes();

Route::get('/home', 'MasyarakatController@index')->name('home');
