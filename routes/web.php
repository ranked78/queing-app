<?php

use App\Http\Controllers\BackPanel\AdminController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserCRUDController;
use App\Http\Controllers\QueueController;


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



Route::get('/', function () {
    return view('welcome');
});


// Registrar Pages
Route::prefix('')->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->middleware(['auth', 'verified'])->name('dashboard');

    Route::resource('queue-list', QueueController::class);
});


Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    //Delete Queues
    Route::delete('/queues/delete', [QueueController::class, 'deleteAll'])->name('queues.delete');
});

require __DIR__ . '/auth.php';

Route::middleware(['auth', 'role:admin'])->group(function () {
    Route::get('admin/home', [AdminController::class, 'dashboard']);
    Route::resource('admin/users', UserCRUDController::class);
});

Route::get('/queues/create', [QueueController::class, 'create'])->name('queue.create');
Route::get('/queues/show/{id}', [QueueController::class, 'show'])->name('queue.show');
Route::post('/queues/store', [QueueController::class, 'store'])->name('queue.store');
Route::post('/update-queue-status', [QueueController::class, 'updateStatus'])->name('update.queue.status');
