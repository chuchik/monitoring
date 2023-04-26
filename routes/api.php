<?php

use Illuminate\Http\Request;

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

Route::post('/v1/log', function (){
    $requestBody = \request()->post();
    $agentToken = $requestBody['token'];
    if (!empty($agentToken)) {
        $agent = \App\Agent::where('token', $agentToken)->first();
        if ($agent) {
            $logger = new \App\Services\LoggerService();
            if ($logger->Log($requestBody, $agent)) {
                return new \Illuminate\Http\Response("", 200);
            }
            return new \Illuminate\Http\Response("Something went incorrect", 500);
        }
    }
    return new \Illuminate\Http\Response("Forbidden action", 403);

});
