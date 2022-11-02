<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\IndexController;
use App\Http\Controllers\HomeController;
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
// Тестовый контроллер объявлений
Route::middleware("r")->group(function(){
    Route::get('/', [IndexController::class, 'index'])->name('home');
});

Route::prefix("news")->middleware('r')->group(function(){
    Route::get('[id]', [IndexController::class, 'index'])->name('home');
});


Route::view('/','welcome')->middleware("r");




//
//Route::get('/', [BbsController::class, 'index'])->name('index');
//
//Auth::routes();
//Route::get('/home', [HomeController::class, 'index'])->name('home');
//Route::get('/home/add', [HomeController::class, 'showAddBbForm'])->name('bb.add');
//Route::post('home',[HomeController::class, 'storeBb'])->name('bb.store');
//
//Route::get('home/{bb}/edit',[HomeController::class, 'showEditBbForm'])
//    ->name('bb.edit')->middleware('can:update, bb');
//Route::patch('home/{bb}', [HomeController::class, 'updateBb'])
//    ->name('bb.update')->middleware('can:update, bb');
//Route::get('home/{bb}/delete', [HomeController::class, 'showDeleteBbForm'])
//    ->name('bb.delete')->middleware('can:destroy, bb');
//Route::delete('home/{bb}/destroy', [HomeController::class, 'destroyBb'])
//    ->name('bb.destroy')->middleware('can:destroy, bb');
//
//Route::get('/{bb}', [BbsController::class, 'detail'])->name('detail');
Route::get('/phpmyinfo', function () {phpinfo();})->name('phpmyinfo');

// Пробуем создать контроллер управления пользователями



