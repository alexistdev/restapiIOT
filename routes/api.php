<?php


use App\Http\Controllers\api\{AuthController,LabController,SensorController};
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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

//Route::group(['middleware' => 'auth:sanctum'], function (){
//    Route::post('/auth', [AuthController::class, 'login']);
//});
Route::post('/auth', [AuthController::class, 'login']);
Route::get('/lab', [LabController::class, 'get_data_lab']);
Route::get('/data', [LabController::class, 'get_data_sensor']);
Route::put('/sensor', [SensorController::class, 'sensor']);
Route::patch('/sensor/penyiraman', [LabController::class, 'set_penyiraman']);
Route::patch('/sensor/pemupukan', [LabController::class, 'set_pemupukan']);


