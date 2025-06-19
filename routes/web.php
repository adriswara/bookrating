<?php

use App\Http\Controllers\BookListController;
use Illuminate\Support\Facades\Route;

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


Route::get('/index', function () {
    return view('index');
})->name('index');

// Route::get('/booklist', function () {
//     return view('booklist');
// })->name('booklist');

Route::get('/authorlist', [AuthorListController::class, 'index'])->name('authorlist');
Route::get('/booklist', [BookListController::class, 'index'])->name('booklist');
