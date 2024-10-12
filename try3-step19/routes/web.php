<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;

// リソースコントローラーを使用のため、無効にした
// Route::get('post/{post}/edit', [PostController::class, 'edit'])
// ->name('post.edit');

// Route::patch('post/{post}', [PostController::class, 'update'])
// ->name('post.update');

// Route::get('post/show/{post}',[PostController::class, 'show'])
// ->name('post.show');

Route::resource('post', PostController::class);

Route::get('/', function () {
    return view('welcome');
});
// ->middleware('can:test');

Route::get('/dashboard', function () {
    return view('dashboard');
// })->middleware(['auth', 'verified']) リソースコントローラーの利用につき無効にした
})->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::get('post/create', [PostController::class, 'create']);
// ->middleware(['auth','admin']);
// ＊コメントアウト、インで;を付けたり、消したりする事

// リソースコントローラーの利用につき無効にした
// Route::post('post', [PostController::class, 'store'])
// ->name('post.store');

// Route::get('post', [PostController::class, 'index'])
// ->name('post.index');

// Route::delete('post/{post}',[PostController::class, 'destroy'])
// ->name('post.destroy');

require __DIR__.'/auth.php';


// //10/11テストコード追加
// use Faker\Factory as Faker;

// Route::get('/faker-test', function () {
//     // Fakerのインスタンスを作成
//     $faker = Faker::create(); // Factoryを使ってインスタンスを生成

//     // Fakerを使ってランダムなデータを生成
//     $randomName = $faker->name;
//     $randomEmail = $faker->email;

//     // 生成したデータを返す
//     return "Random Name: $randomName, Random Email: $randomEmail";
// });