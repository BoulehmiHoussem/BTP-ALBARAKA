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


Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::prefix('employee')->name('employee.')->group(function () {
    Route::get('/', [App\Http\Controllers\EmployeeController::class, 'index'])->name('list');
    Route::get('/create', [App\Http\Controllers\EmployeeController::class, 'create'])->name('create');
    Route::get('/edit/{id}', [App\Http\Controllers\EmployeeController::class, 'edit'])->name('edit');
    Route::post('/store', [App\Http\Controllers\EmployeeController::class, 'store'])->name('store');
    
});


Route::prefix('planning')->name('planning.')->group(function () {
    Route::post('/store', [App\Http\Controllers\PlanningController::class, 'store'])->name('store');
    
    Route::get('/config/{id_chantier}/{id_planning}', [App\Http\Controllers\PlanningController::class, 'show'])->name('calendar');
    Route::get('/chantiers', [App\Http\Controllers\PlanningController::class, 'index'])->name('chantiers');
    Route::get('/chantiers/{id}', [App\Http\Controllers\PlanningController::class, 'plannings'])->name('list');
    Route::get('/chantiers/{id}/create', [App\Http\Controllers\PlanningController::class, 'create'])->name('create');
});

Route::prefix('resources_humaines')->name('rh.')->group(function () {
    Route::get('/', [App\Http\Controllers\HrController::class, 'index'])->name('list');
});

Route::prefix('products')->name('products.')->group(function () {
    Route::get('/', [App\Http\Controllers\ProductsController::class, 'index'])->name('list');
    Route::get('/create', [App\Http\Controllers\ProductsController::class, 'create'])->name('create');
    Route::post('/store', [App\Http\Controllers\ProductsController::class, 'store'])->name('store');
    Route::post('/search', [App\Http\Controllers\ProductsController::class, 'search'])->name('search');
});

Route::prefix('locations')->name('locations.')->group(function () {
    Route::get('/', [App\Http\Controllers\LocationsController::class, 'index'])->name('list');
    Route::get('/create', [App\Http\Controllers\LocationsController::class, 'create'])->name('create');
    Route::get('/edit/{id}', [App\Http\Controllers\LocationsController::class, 'edit'])->name('edit');
    Route::post('/store', [App\Http\Controllers\LocationsController::class, 'store'])->name('store');
    Route::post('/search', [App\Http\Controllers\LocationsController::class, 'search'])->name('search');
});

Route::prefix('demandes_achat')->name('demands.')->group(function () {
    Route::get('/', [App\Http\Controllers\DemandsController::class, 'index'])->name('list');
});

Route::prefix('taches')->name('tasks.')->group(function () {
    Route::get('/', [App\Http\Controllers\TaskController::class, 'index'])->name('list');
    Route::get('/create', [App\Http\Controllers\TaskController::class, 'create'])->name('create');
    Route::get('/edit/{id}', [App\Http\Controllers\TaskController::class, 'edit'])->name('edit');
    Route::post('/store', [App\Http\Controllers\TaskController::class, 'store'])->name('store');
    Route::post('/newtask', [App\Http\Controllers\TaskController::class, 'newtask'])->name('newtask');
    Route::post('/search', [App\Http\Controllers\TaskController::class, 'search'])->name('search');
    Route::get('/gettask', [App\Http\Controllers\TaskController::class, 'getTask'])->name('gettask');
    Route::post('/refreshtask', [App\Http\Controllers\TaskController::class, 'getTask'])->name('refresh');
    
});

Route::prefix('chantiers')->name('chantiers.')->group(function () {
    Route::get('/', [App\Http\Controllers\ChantierController::class, 'index'])->name('list');
    Route::get('/create', [App\Http\Controllers\ChantierController::class, 'create'])->name('create');
    Route::post('/store', [App\Http\Controllers\ChantierController::class, 'store'])->name('store');
    Route::post('/update/{id}', [App\Http\Controllers\ChantierController::class, 'update'])->name('update');
    Route::get('/edit/{id}', [App\Http\Controllers\ChantierController::class, 'edit'])->name('edit');
});