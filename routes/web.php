<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PostController;

Route::get('/', [HomeController::class, 'index']);

Route::get('/post', [PostController::class, 'index']);

Route::get('/post/show/{id}', [PostController::class, 'getPostById']);

Route::get('/post/create', [PostController::class, 'create']);

Route::get('/post/edit/{id}', [PostController::class, 'edit']);
