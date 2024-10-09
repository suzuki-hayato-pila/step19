<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;

Route::get('post/{post}/edit', [PostController::class, 'edit'])
->name('post.edit');

Route::patch('post/{post}', [PostController::class, 'update'])
->name('post.update');

Route::get('post/show/{post}',[PostController::class, 'show'])
->name('post.show');

Route::get('/', function () {
    return view('welcome');
});
// ->middleware('can:test');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::get('post/create', [PostController::class, 'create']);
// ->middleware(['auth','admin']);
// ＊コメントアウト、インで;を付けたり、消したりする事

Route::post('post', [PostController::class, 'store'])
->name('post.store');

Route::get('post', [PostController::class, 'index']);

require __DIR__.'/auth.php';
