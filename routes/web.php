<?php

use App\Http\Controllers\AdminController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TodoController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
 */

//Route::get('/', function () {
//    return view('welcome');
//});

Route::group(['prefix' => 'admin', 'middleware' => ['admin:admin']], function () {
    Route::get('/login', [AdminController::class, 'loginForm']);
    Route::post('/login', [AdminController::class, 'store'])->name('admin.login');
});

Route::middleware(['auth:sanctum,admin', 'verified'])->get('/admin/dashboard', function () {
    return view('dashboard');
})->name('dashboard');

Route::middleware(['auth:sanctum,web', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');


Route::group([
    'prefix' => '',
], function () {
    Route::get('/', [TodoController::class, 'index'])->name('all');
    Route::get('/create', [TodoController::class, 'create'])->name('create');
    Route::post('/store', [TodoController::class, 'store'])->name('store');
    Route::get('/edit/{todo}', [TodoController::class, 'edit']);
    Route::post('/update/{todo}', [TodoController::class, 'update'])->name('update');
    Route::put('/{todo}', [TodoController::class, 'complete'])->name('todo.complete');
    Route::post('/{todo}', [TodoController::class, 'incomplete'])->name('todo.incomplete');
    Route::delete('/{todo}', [TodoController::class, 'delete'])->name('todo.delete');
});
