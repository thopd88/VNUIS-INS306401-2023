<?php

use App\Models\Book;
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
    Book::create([
        'title' => 'The Great Gatsby',
        'author' => 'F. Scott Fitzgerald',
        'publisher' => 'Charles Scribner\'s Sons'
    ]);
    return Book::all();
});
