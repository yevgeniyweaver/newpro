<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');




Route::get('/kitchens', "KitchenController@index")->name('kitchen.get');
Route::get('/kitchens/export', "KitchenController@export")->name('kitchen.export');
