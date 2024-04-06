<?php

use App\Http\Controllers\ProductController;
use App\Http\Middleware\AccessLevelChecker;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Route;

Route::get("products", [ProductController::class, "index"])->name("products.get");

Route::get('/admin-panel', function (Request $request) 
{
    return response()->json([], Response::HTTP_OK);
})->middleware(AccessLevelChecker::class);

Route::middleware('auth:sanctum')->get('/perfil', function (Request $request) 
{
    return $request->user();
});

