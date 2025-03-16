<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::get("/hi", function () {
    return response()->json(["message" => "hello"]);
});


Route::get("/run-artisan", function () {
    try {
        Artisan::call('migrate', [
            '--force' => true,
        ]);
        // Artisan::call("storage:link");
        // Artisan::call("l5-swagger:generate");
        return response()->json([
            "message" => "Artisan commands ran succcessfully"
        ], 200);
    } catch (\Throwable $th) {
        return response()->json([
            "error" => "Failed to run artisan commands " . $th->getMessage()
        ], 500);
    }
});