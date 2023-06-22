<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BBSController;
use App\Http\Controllers\CoachController;
use App\Http\Controllers\TeamController;
use App\Http\Controllers\PlayerController;
use App\Http\Controllers\PositionController;

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

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';


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


/////////////////////////////////////////////////////////////////////////////////////////////////////
// /*コーチチームプレイヤーポジション

// Coachのデータを一覧表示する
Route::get('/coach', [
    CoachController::class, 'list'
]);

// これはポジション
Route::get('/position', [
    PositionController::class, 'list'
]);

// /* Teamのデータを一覧表示する
Route::get('/team', [
    TeamController::class, 'list'
]);

// /* Playerのデータを一覧表示する
Route::get('/player', [
    PlayerController::class, 'list'
]);


//編集チーム
Route::get('/team/edit/{id}', [TeamController::class, 'edit']);
Route::post('/team/edit/{id}', [TeamController::class, 'update']);

//編集プレイやー
Route::get('/player/edit/{id}', [PlayerController::class, 'edit']);
Route::post('/player/edit/{id}', [PlayerController::class, 'update']);

//編集コーチ
Route::get('/coach/edit/{id}', [CoachController::class, 'edit']);
Route::post('/coach/edit/{id}', [CoachController::class, 'update']);

//編集ポジ
Route::get('/position/edit/{id}', [PositionController::class, 'edit']);
Route::post('/position/edit/{id}', [PositionController::class, 'update']);

// コーチ登録
Route::get('/coach/add', function () {
    return view('add_coach');
});
// Route::get('/coach/add', [TeamController::class, 'add']);
Route::post('/coach/confirm', [CoachController::class, 'add']);

// チーム登録
Route::get('/team/add', [TeamController::class, 'add']);
Route::post('/team/confirm', [TeamController::class, 'confirm']);

// プレイヤー登録
Route::get('/player/add', [PlayerController::class, 'add']);
Route::post('player/confirm', [PlayerController::class, 'confirm']);

// ポジション登録
Route::get('/position/add', [PositionController::class, 'add']);
Route::post('position/confirm', [PositionController::class, 'confirm']);


#################################################################################################
########

/* Storage ファサードを読み込み */

use Illuminate\Support\Facades\Storage;
use App\Http\Controllers\UploadImageController;


/* Storage ファサードを使ってファイルの操作をしてみる */

Route::get('storage_test', function () {
    /* タイムスタンプを含めたテキストファイル名を作成 */
    $filename = time() . '.txt';
    /* テキストファイルの内容を作成 */
    $content = "ファイル名: {$filename}";

    /* Storage::put(<ファイルパス>, <内容>) で、ファイルを作成
     * ファイル名だけ記載した場合は、操作対象のdisk の直下に作成される
     */
    Storage::put($filename, $content);

    /* Storage::files(ファイルパス) で、ファイルの一覧を取得 */
    $files = Storage::files();
    dump($files);
});

/* 画像アップロードフォームを表示するルーティング */
Route::get('upload_form', function () {
    return view('upload_form');
});

/* POST 送信された画像を受け取って保存するルーティング */
Route::post('upload_form', [UploadImageController::class, 'upload']);

/* アップロードされた画像の一覧を表示するルーティング */
Route::get('upload_images', [UploadImageController::class, 'index']);
