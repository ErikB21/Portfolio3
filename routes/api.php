<?php

use App\Http\Controllers\api\AdminController;
use App\Http\Controllers\api\CertificationController;
use App\Http\Controllers\api\ProjectController;
use App\Http\Controllers\api\SkillController;
use App\Http\Controllers\api\WorkController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/skill', [SkillController::class, 'index']);
Route::get('/work-timeline', [WorkController::class, 'index']);
Route::get('/certification', [CertificationController::class, 'index']);
Route::get('/project', [ProjectController::class, 'index']);
Route::get('/project/{id}', [ProjectController::class, 'show']);
Route::get('/admin', [AdminController::class, 'index']);
