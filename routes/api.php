<?php

use Illuminate\Http\Request;


Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

//Product Api Route
Route::apiResource('/products','ProductController');

//Group Api Route Reviews
Route::group(['prefix'=>'products'],function(){
    Route::apiResource('/{products}/reviews','ReviewController');
});
