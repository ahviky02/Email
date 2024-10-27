<?php

use Illuminate\Support\Facades\Route;
use Spatie\FlareClient\Api;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\SearchController;

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

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/compose', [App\Http\Controllers\PostController::class, 'compose'])->name('compose');
Route::get('/inbox', [App\Http\Controllers\PostController::class, 'inbox'])->name('inbox');
Route::get('/send', [App\Http\Controllers\PostController::class, 'send'])->name('send');
// Route::get('/index-read/{data}', [App\Http\Controllers\PostController::class, 'inboxRead'])->name('inboxRead');
Route::get('/index-read', function (Illuminate\Http\Request $request) {
    $data = json_decode(urldecode($request->query('data')));
    return view('pages.inboxRead', compact('data'));
})->name('read-page');

Route::get('/send-read', function (Illuminate\Http\Request $request) {
    $data = json_decode(urldecode($request->query('data')));
    return view('pages.sendRead', compact('data'));
})->name('read-send-page');

// Route::get('/delete', [App\Http\Controllers\PostController::class, 'delete'])->name('del');

Route::delete('/delete/{id}', [App\Http\Controllers\PostController::class, 'delete'])->name('del');
Route::get('/ajax-search-inbox', [App\Http\Controllers\SearchController::class, 'searchInbox'])->name('ajax-search-inbox');
Route::get('/ajax-search-send', [App\Http\Controllers\SearchController::class, 'searchSend'])->name('ajax-search-send');

// Route::post('/send', [App\Http\Controllers\PostController::class, 'send']);

Route::get('/download/{filename}', [App\Http\Controllers\PostController::class, 'download'])->name('file.download');


// post routes

Route::post('/compose', [App\Http\Controllers\PostController::class, 'composeSubmit']);
