<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DeafController;

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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get("getDeafs", [DeafController::class, "getDeafs"]);
Route::post("addDeaf", [DeafController::class, "addDeaf"]);
Route::put("updateDeaf", [DeafController::class, "update"]);
Route::delete("deleteDeaf", [DeafController::class, "destroy"]);