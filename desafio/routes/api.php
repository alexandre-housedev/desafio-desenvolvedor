<?php

use App\Http\Controllers\Api\LoginController;
use App\Http\Controllers\Api\UploadFileController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;


Route::post('/login', [LoginController::class, 'login'])->name('login');

Route::group(['middleware' => ['auth:sanctum']], function(){
    Route::post('/upload-file', [UploadFileController::class, 'upload'])->name('upload');
});