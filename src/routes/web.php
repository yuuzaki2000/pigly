<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\WeightLogController;
use App\Http\Controllers\WeightTargetController;

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
Route::middleware('auth')->group(function () {
    Route::get('/weight_logs', [WeightLogController::class, 'index']);
});
Route::post('/weight_logs', [WeightLogController::class, 'store']);

Route::get('/register/step2', [WeightTargetController::class, 'index']);
Route::post('/weight_logs', [WeightTargetController::class, 'store']);
Route::get('/weight_logs/goal_setting', [WeightTargetController::class, 'edit']);
Route::post('/weight_logs/goal_setting', [WeightTargetController::class, 'update']);


Route::get('/weight_logs/{weightLogId}/', [WeightLogController::class, 'detail']);
Route::post('/weight_logs/{weightLogId}/update', [WeightLogController::class, 'update']);
Route::post('/weight_logs/{weightLogId}/create', [WeightLogController::class, 'create']);
Route::post('/weight_logs/{weightLogId}/delete', [WeightLogController::class, 'delete']);

/*最後に、routingの順番に留意・確認を */
