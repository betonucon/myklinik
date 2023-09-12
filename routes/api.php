<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
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
// $router->get('/employe/request_service_r', 'UserController@request_service_r');
$router->post('/employe/send_service_r', [UserController::class, 'send_service_r']);
$router->post('/employe/request_service_r', [UserController::class, 'request_service_r']);
$router->post('/employe/rcv_service', [UserController::class, 'rcv_service']);