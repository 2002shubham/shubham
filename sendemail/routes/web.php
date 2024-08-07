<?php

use App\Http\Controllers\EmailController;
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

// Route::get('sendemail',[EmailController::class,'viewEmailPage']);
// Route::post('sendemail',[EmailController::class,'sendEmail']);

Route::controller(EmailController::class)->group(function(){
    Route::get('sendemail','viewEmailPage');
    Route::post('sendemail','sendEmail');

    // Send Email With Attachment
    Route::get('email','email');
    Route::post('email','send');
});