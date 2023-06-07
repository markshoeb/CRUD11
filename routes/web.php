<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\StudentController;
use App\Mail\OrderShipped;
use Illuminate\Support\Facades\Mail;
use App\Notifications\OrderShippedNotification;

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

//Route::get('/', [StudentController::class, 'index'])->name('index');
//Route::post('/', [StudentController::class, 'create'])->name('create');
Route::get('/edit/{id}', [StudentController::class, 'edit'])->name('edit');
Route::put('/edit/{id}', [StudentController::class, 'update'])->name('update');
Route::get('/delete/{id}', [StudentController::class, 'destroy'])->name('destroy');



Route::get(uri: '/', function () {
    $user = User::inRandomOrder()->first();

    $user->notify(new \App\Notifications\OrderShippedNotification));
});
