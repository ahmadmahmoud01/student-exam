<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ExcelController;
use App\Http\Controllers\StudentController;

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

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/', [StudentController::class, 'showForm']);
// Route::post('/check', [StudentController::class, 'checkMark']);

Route::post('/check', [StudentController::class, 'checkMark'])->name('check.mark');


Route::get('/import-view', [ExcelController::class, 'importView']);
Route::post('/import', [ExcelController::class, 'import'])->name('import');


