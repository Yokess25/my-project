<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|// Schoolstud::whereId($id)->update($schoolstud);
// $user = User::where('email', $request->email)->first();
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
Auth::routes();
Route::get('/', function () {
    return view('layouts.app');
});


Route::get('home', [HomeController::class, 'home'])->name('home');
Route::get('signout', [HomeController::class, 'signout'])->name('signout');
Route::get('registerstud', [HomeController::class, 'create'])->name('registerstud');
Route::get('index', [HomeController::class, 'index'])->name('index');
Route::post('store', [HomeController::class, 'store'])->name('store');
Route::get('edit/{id}', [HomeController::class, 'edit'])->name('edit');
Route::post('update/{id}', [HomeController::class, 'update'])->name('update');
Route::post('delete/{id}', [HomeController::class, 'delete'])->name('delete');

Route::get('stateregister', [HomeController::class, 'statereg'])->name('statereg');
Route::get('stateindex', [HomeController::class, 'state'])->name('state');
Route::post('storestate', [HomeController::class, 'storestate'])->name('storestate');
Route::get('editstate/{id}', [HomeController::class, 'editstate'])->name('editstate');
Route::post('updatestate/{id}', [HomeController::class, 'updatestate'])->name('updatestate');
Route::post('deletestate/{id}', [HomeController::class, 'deletestate'])->name('deletestate');

Route::get('districtregister', [HomeController::class, 'districtreg'])->name('districtreg');
Route::get('districtindex', [HomeController::class, 'district'])->name('district');
Route::post('storedistrict', [HomeController::class, 'storedistrict'])->name('storedistrict');
Route::get('editdistrict/{id}', [HomeController::class, 'editdistrict'])->name('editdistrict');
Route::post('updatedistrict/{id}', [HomeController::class, 'updatedistrict'])->name('updatedistrict');
Route::post('deletedistrict/{id}', [HomeController::class, 'deletedistrict'])->name('deletedistrict');

Route::get('locationregister', [HomeController::class, 'locationreg'])->name('locationreg');
Route::get('locationindex', [HomeController::class, 'location'])->name('location');
Route::post('storelocation', [HomeController::class, 'storelocation'])->name('storelocation');
Route::get('editlocation/{id}', [HomeController::class, 'editlocation'])->name('editlocation');
Route::post('updatelocation/{id}', [HomeController::class, 'updatelocation'])->name('updatelocation');
Route::post('deletelocation/{id}', [HomeController::class, 'deletelocation'])->name('deletelocation');

Route::get('DistrictsAll', [HomeController::class, 'filter'])->name('DistrictsAll');