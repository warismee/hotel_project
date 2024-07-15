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

Route::get('/create_room',[AdminController::class,'create_room'])->middleware(['auth','admin']);
Route::post('/add_room',[AdminController::class,'add_room'])->middleware(['auth','admin']);

Route::get('/view_room',[AdminController::class,'view_room'])->middleware(['auth','admin']);
Route::get('/deleteroom/{id}',[AdminController::class,'deleteroom'])->middleware(['auth','admin']);

Route::get('/update_room/{id}',[AdminController::class,'update_room'])->middleware(['auth','admin']);
Route::post('/edit_room/{id}',[AdminController::class,'edit_room'])->middleware(['auth','admin']);

Route::get('/room_details/{id}',[HomeController::class,'room_details']);
Route::post('/add_booking/{id}',[HomeController::class,'add_booking'])->name('add_booking');

Route::get('/bookings',[AdminController::class,'bookings'])->middleware(['auth','admin']);
Route::get('/deletebooking/{id}',[AdminController::class,'deletebooking'])->middleware(['auth','admin']);
Route::get('/approve_booking/{id}',[AdminController::class,'approve_booking'])->middleware(['auth','admin']);
Route::get('/reject_booking/{id}',[AdminController::class,'reject_booking'])->middleware(['auth','admin']);

Route::get('/view_gallery',[AdminController::class,'view_gallery'])->middleware(['auth','admin']);
Route::post('/upload_gallery',[AdminController::class,'upload_gallery'])->middleware(['auth','admin']);
Route::get('/delete_gallery/{id}',[AdminController::class,'delete_gallery'])->middleware(['auth','admin']);

Route::post('/contact',[HomeController::class,'contact']);

Route::get('/all_message',[AdminController::class,'all_message'])->middleware(['auth','admin']);
Route::get('/sendmail/{id}',[AdminController::class,'sendmail'])->middleware(['auth','admin']);

Route::post('/mail/{id}',[AdminController::class,'mail'])->middleware(['auth','admin']);

Route::get('/our_rooms',[HomeController::class,'our_rooms']);
Route::get('/hotel_gallery',[HomeController::class,'hotel_gallery']);
Route::get('/contact_us',[HomeController::class,'contact_us']);