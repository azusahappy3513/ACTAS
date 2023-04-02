<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use App\Http\Controllers\PostController;
use App\Http\Controllers\BookController; 
use App\Http\Controllers\TodoController; 
use App\Models\User; 
use App\Models\Book; 
use App\Models\User_books; 
use App\Models\Todo;
use App\Http\Controllers\MatchingController;
use App\Http\Controllers\userprofileController;


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
})->name('top');

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');


Route::get('/todos', function () {
    return view('todos.index');
});
// Route::get('/todos/store', function () {
//     return view('todos.store');
// // });
// Route::resource('user', UserController::class);
Route::resource('/todos', TodoController::class);
// Route::get('/todos/store',[ TodoController::class, 'store'] );
// ↑->middleware(['auth'])->name('todos.index')
// Route::get('/bookdata', function () {
//     return view('dashboard');
// })->middleware(['auth', 'verified'])->name('dashboard');

// //本：ダッシュボード表示(books.blade.php)
// 　↓
Route::get('/bookdata', [BookController::class,'index'])->middleware(['auth'])->name('book_index');
// ->middleware(['auth'])->name('dashboard')↓
// Route::get('bookdata/bookboard', [BookController::class,'index'])->middleware(['auth'])->name('book_index');
// /{user}
Route::get('/matching', [MatchingController::class, 'show'])->middleware(['auth'])->name('matching.show');
// ↓
Route::get('/userprofile', [userprofileController::class, 'index'])->middleware(['auth'])->name('userprofile.index');

Route::get('/user', [ProfileController::class,'index'])->middleware(['auth'])->name('index');
//本：追加 
Route::post('/bookdata/bookboard/books',[BookController::class,"store"])->name('book_store');

//本：削除 
Route::delete('/bookdata/bookboard/book/{book}', [BookController::class,"destroy"])->name('book_destroy');

//本：更新画面
Route::post('/bookdata/bookboard/booksedit/{book}',[BookController::class,"edit"])->name('book_edit'); //通常
Route::get('/bookdata/bookboard/booksedit/{book}', [BookController::class,"edit"])->name('edit');      //Validationエラーありの場合

//本：更新画面
Route::post('/bookdata/bookboard/books/update',[BookController::class,"update"])->name('book_update');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');



});

Route::resource('post', PostController::class);
require __DIR__.'/auth.php';
