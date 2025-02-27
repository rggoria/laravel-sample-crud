<?php

use App\Http\Controllers\HomepageCntroller;
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


Route::get('/', [HomepageCntroller::class, 'index']);
Route::get('/dashboard', [HomepageCntroller::class, 'getData'])->name('dashboard');
Route::get('/add-form', [HomepageCntroller::class, 'addForm'])->name('user.add');
Route::post('/add-form/insert', [HomepageCntroller::class, 'insertForm'])->name('insert');
Route::get('/edit-form/{id}', [HomepageCntroller::class, 'editForm'])->name('user.edit');
Route::post('/edit-form/{id}/update', [HomepageCntroller::class, 'updateForm'])->name('user.update');
Route::delete('/delete/{id}', [HomepageCntroller::class, 'delete'])->name('user.delete');


Route::get('/emailer', [HomepageCntroller::class, 'emailer'])->name('emailer');
Route::post('/emailer/emailerSubmit', [HomepageCntroller::class, 'emailerSubmit'])->name('emailerSubmit');