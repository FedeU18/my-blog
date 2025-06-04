<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
  return view('home');
});
Route::get('/post', function () {
  return view('post.index');
});
Route::get('/post/show/{id}', function () {
  return view('post.show');
});
Route::get('/post/create', function () {
  return view('post.create');
});
Route::get('/post/edit/{id}', function () {
  return view('post.edit');
});
