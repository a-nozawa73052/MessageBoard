<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BBSController;

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

///////////////////////////////////////////////////////////////////////////////////////////////////////////////
//ここからBBS


////////controller
Route::get('/MessageBoard', [BBSController::class, 'add']);
Route::post('/MessageBoard/confirm', [BBSController::class, 'confirm']);

////complete
Route::get('/MessageBoard/complete', function () {
    return view('BBS.complete');
});


///////////////////////////////////////
///////////////list
Route::get('/MessageBoard/index', [
    BBSController::class, 'list'
]);

///////////////////////////////////////
///////////////find
// Route::get('/MessageBoard/index/{}', [
//     BBSController::class, 'find'
// ]);



///////////////////////////////////////
///////////////status
Route::post('/MessageBoard/status/{id}', [
    BBSController::class, 'status'
]);

///////////////////////////////////////
///////////////delete
Route::post('/MessageBoard/delete/{id}', [
    BBSController::class, 'delete'
]);

///////////////////////////////////////
///////////////edit
Route::get('/MessageBoard/edit/{id}', [
    BBSController::class, 'edit'
]);

///////////////////////////////////////
///////////////update
Route::post('/MessageBoard/edit/{id}', [
    BBSController::class, 'update'
]);
