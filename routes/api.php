<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TodoController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::controller(TodoController::class)->group(function () {
    Route::delete('/todos', 'index');
    Route::post('/todos', 'store');
    Route::delete('/todos/{todo}', 'delete');
});
