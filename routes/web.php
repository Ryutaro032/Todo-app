<?php

use App\Http\Controllers\TaskController;
use App\Http\Controllers\FolderController;
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

Route::group(['middleware' => 'auth'],function(){
    Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
    //一覧表示
    Route::get('/folders/{id}/tasks',  [TaskController::class, 'index'])->name('tasks.index');
    //フォルダ作成機能
    Route::get('/folders/create', [FolderController::class, 'showCreate'])->name('folders.create');
    Route::post('/folders/create', [FolderController::class, 'create']);
    //タスク作成機能
    Route::get('/folders/{id}/tasks/create', [TaskController::class, 'showCreate'])->name('tasks.create');
    Route::post('/folders/{id}/tasks/create', [TaskController::class, 'create']);
    //タスク編集機能
    Route::get('/folders/{id}/tasks/{task_id}/edit', [TaskController::class, 'showEditForm'])->name('tasks.edit');
    Route::post('/folders/{id}/tasks/{task_id}/edit', [TaskController::class, 'edit']);
});

Auth::routes();
