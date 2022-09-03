<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\CertificateController;

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
Route::get('/admin',[AdminController::class,'index']);
Route::get('/',[CertificateController::class,'user_side_view']);
Route::post('/admin_auth',[AdminController::class,'admin_auth']);
Route::get('/user_side/{id?}',[CertificateController::class,'user_side_view']);
// Route::get('/search',[CertificateController::class,'search']);
Route::group(['middleware'=> ['admin_auth']],function(){
    Route::get('/deshbord',[AdminController::class,'deshbord']);
    Route::get('/add_new_certificate',[CertificateController::class,'index'] );
    Route::post('/add_new_certificate',[CertificateController::class,'store'] );
    Route::get('/all_certificate',[CertificateController::class,'show'] );
    Route::get('certificate-edit/{id}',[CertificateController::class,'edit'] );
    Route::post('update_certificate/{id}',[CertificateController::class,'update'] );
});
