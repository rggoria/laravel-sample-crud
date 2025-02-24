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
Route::get('/add-form', [HomepageCntroller::class, 'addForm'])->name('form');
Route::post('/add-form/insert', [HomepageCntroller::class, 'insertForm'])->name('insert');
