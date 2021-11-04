<?php

use Illuminate\Support\Facades\Route;


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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/search', [App\Http\Controllers\HomeController::class, 'search'])->name('search');
Route::get('/list', [App\Http\Controllers\HomeController::class, 'search'])->name('listturn');
Route::post('/list', [App\Http\Controllers\HomeController::class, 'search'])->name('list');
Route::get('/staff/create', [App\Http\Controllers\HomeController::class, 'showCreate'])->name('input-form');
Route::post('/staff/store', [App\Http\Controllers\HomeController::class, 'exeStore'])->name('store');


Route::get('/staff/edit/{id}', [App\Http\Controllers\HomeController::class, 'showEdit'])->name('edit');
Route::post('/staff/edit/{id}', [App\Http\Controllers\HomeController::class, 'showEdit'])->name('edit');

Route::post('/staff/update/{id}', [App\Http\Controllers\HomeController::class, 'exeUpdate'])->name('update');

Route::get('/staff/detail/{id}', [App\Http\Controllers\HomeController::class, 'showDetail'])->name('show');
Route::get('/staff/memo/{id}', [App\Http\Controllers\HomeController::class, 'showMemo'])->name('showmemo');
Route::post('/staff/memoexe/{id}', [App\Http\Controllers\HomeController::class, 'exeMemo'])->name('exememo');
Route::get('/staff/editmemo/{id}/{memoid}', [App\Http\Controllers\HomeController::class, 'editMemo'])->name('editmemo');
Route::post('/staff/updatememo/{id}', [App\Http\Controllers\HomeController::class, 'updateMemo'])->name('updatememo');
Route::post('/staff/deletememo/{id}', [App\Http\Controllers\HomeController::class, 'deleteMemo'])->name('deletememo');
Route::post('/staff/memocheck/{id}', [App\Http\Controllers\HomeController::class, 'memoCheck'])->name('memocheck');
Route::get('/staff/doccreate/{id}', [App\Http\Controllers\HomeController::class, 'docCreate'])->name('doccreate');
Route::post('/staff/exedoc/{id}', [App\Http\Controllers\HomeController::class, 'exeDoc'])->name('exedoc');
Route::get('/staff/editdoc/{id}/{docid}', [App\Http\Controllers\HomeController::class, 'editDoc'])->name('editdoc');
Route::post('/staff/updatedoc/{id}', [App\Http\Controllers\HomeController::class, 'updateDoc'])->name('updatedoc');
Route::post('/staff/doccheck/{id}', [App\Http\Controllers\HomeController::class, 'docCheck'])->name('doccheck');
Route::post('/staff/deletedoc/{id}', [App\Http\Controllers\HomeController::class, 'deleteDoc'])->name('deletedoc');


Route::get('/staff/editlicence/{id}', [App\Http\Controllers\HomeController::class, 'editLicence'])->name('editlicence');
Route::get('/staff/licence/{id}', [App\Http\Controllers\HomeController::class, 'showLicence'])->name('showlicence');
Route::post('/staff/updatelicence/{id}', [App\Http\Controllers\HomeController::class, 'updateLicence'])->name('updatelicence');
Route::get('/csv', [App\Http\Controllers\HomeController::class, 'csvExport'])->name('csv');
Route::get('/test', [App\Http\Controllers\HomeController::class, 'testTest'])->name('test');
