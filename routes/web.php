<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\HomeController;
use App\Http\Controllers\AdminController;
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

// Route::get('/', function () {
//     return view('home.index');
// });

Route::get('/',[AdminController::class,'home']);

Route::get('/home',[AdminController::class,'index'])->name('home');

Route::get('/create_room',[AdminController::class,'create_room']);
Route::post('/add_room',[AdminController::class,'add_room']);

Route::get('/view_room',[AdminController::class,'view_room']);
Route::get('/deleteroom/{id}',[AdminController::class,'deleteroom']);

Route::get('/update_room/{id}',[AdminController::class,'update_room']);
Route::post('/edit_room/{id}',[AdminController::class,'edit_room']);

Route::get('/room_details/{id}',[HomeController::class,'room_details']);
Route::post('/add_booking/{id}',[HomeController::class,'add_booking'])->name('add_booking');

Route::get('/bookings',[AdminController::class,'bookings']);
Route::get('/deletebooking/{id}',[AdminController::class,'deletebooking']);
Route::get('/approve_booking/{id}',[AdminController::class,'approve_booking']);
Route::get('/reject_booking/{id}',[AdminController::class,'reject_booking']);

Route::get('/view_gallery',[AdminController::class,'view_gallery']);
Route::post('/upload_gallery',[AdminController::class,'upload_gallery']);
Route::get('/delete_gallery/{id}',[AdminController::class,'delete_gallery']);