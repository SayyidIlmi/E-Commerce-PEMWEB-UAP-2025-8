<?php

use App\Http\Controllers\MemberController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});


// User CRUD (admin only)
Route::middleware(['auth', 'admin.only'])->group(function () {
    Route::resource('user', UserController::class);
}); 
Route::middleware(['auth', 'admin.only'])
    ->get('/admin/dashboard', fn() => view('admin.dashboard'))
    ->name('admin.dashboard');

Route::middleware(['auth', 'seller.only'])
    ->get('/seller/dashboard', fn() => view('seller.dashboard'))
    ->name('seller.dashboard');

Route::middleware(['auth', 'member.only'])->group(function () {
    Route::get('/member/dashboard', [MemberController::class, 'index'])->name('member.dashboard');
});


    

require __DIR__.'/auth.php';
