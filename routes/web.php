<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
Auth::routes();
Route::get('/', function () {
    return view('layouts.app');
});

// Students
Route::get('home', [HomeController::class, 'home'])->name('home');
Route::get('signout', [HomeController::class, 'signout'])->name('signout');
Route::get('registerstud', [HomeController::class, 'create'])->name('registerstud');
Route::get('index', [HomeController::class, 'index'])->name('index');
Route::post('store', [HomeController::class, 'store'])->name('store');
Route::get('edit/{id}', [HomeController::class, 'edit'])->name('edit');
Route::post('update/{id}', [HomeController::class, 'update'])->name('update');
Route::post('delete/{id}', [HomeController::class, 'delete'])->name('delete');
Route::post('import_page', [HomeController::class, 'insert'])->name('import_page');
Route::post('export_file', [HomeController::class, 'export'])->name('export_file');
Route::get('students_list', [HomeController::class, 'studpdf'])->name('students_list');

// States
Route::get('stateregister', [HomeController::class, 'statereg'])->name('statereg');
Route::get('stateindex', [HomeController::class, 'state'])->name('state');
Route::post('storestate', [HomeController::class, 'storestate'])->name('storestate');
Route::get('editstate/{id}', [HomeController::class, 'editstate'])->name('editstate');
Route::post('updatestate/{id}', [HomeController::class, 'updatestate'])->name('updatestate');
Route::post('deletestate/{id}', [HomeController::class, 'deletestate'])->name('deletestate');

// Districts
Route::get('districtregister', [HomeController::class, 'districtreg'])->name('districtreg');
Route::get('districtindex', [HomeController::class, 'district'])->name('district');
Route::post('storedistrict', [HomeController::class, 'storedistrict'])->name('storedistrict');
Route::get('editdistrict/{id}', [HomeController::class, 'editdistrict'])->name('editdistrict');
Route::post('updatedistrict/{id}', [HomeController::class, 'updatedistrict'])->name('updatedistrict');
Route::post('deletedistrict/{id}', [HomeController::class, 'deletedistrict'])->name('deletedistrict');
Route::get('alldist', [HomeController::class, 'filter'])->name('alldist');

// Locations
Route::get('locationregister', [HomeController::class, 'locationreg'])->name('locationreg');
Route::get('locationindex', [HomeController::class, 'location'])->name('location');
Route::post('storelocation', [HomeController::class, 'storelocation'])->name('storelocation');
Route::get('editlocation/{id}', [HomeController::class, 'editlocation'])->name('editlocation');
Route::post('updatelocation/{id}', [HomeController::class, 'updatelocation'])->name('updatelocation');
Route::post('deletelocation/{id}', [HomeController::class, 'deletelocation'])->name('deletelocation');
Route::get('locationlist', [HomeController::class, 'fltloc'])->name('locationlist');

// Import/Export
Route::get('import_or_export', [HomeController::class, 'import_or_export'])->name('imtext');
Route::get('import_stud', [HomeController::class, 'import_stud'])->name('import_stud');
Route::get('import_mark', [HomeController::class, 'import_mark'])->name('import_mark');

// Marks
Route::get('registermarks', [HomeController::class, 'regmark'])->name('addmarks');
Route::get('studentsmark', [HomeController::class, 'markindex'])->name('markindex');
Route::post('storemarks', [HomeController::class, 'storemarks'])->name('savemarks');
Route::get('showmarks/{id}', [HomeController::class, 'show'])->name('showmarks');
Route::get('editmarks/{id}', [HomeController::class, 'editmarks'])->name('editmarks');
Route::post('updatemarks/{id}', [HomeController::class, 'updatemarks'])->name('updatemarks');
Route::post('import_marks', [HomeController::class, 'import_marks'])->name('import_marks');
Route::post('export_mark', [HomeController::class, 'export_mark'])->name('export_mark');
Route::get('marks_download', [HomeController::class, 'downloadPDF'])->name('marksdownload');