<?php

use App\Http\Controllers\CommentController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;

// Ruta para la página de inicio no autenticada
Route::get('/', [PostController::class, 'index']);

// Ruta para la página de inicio autenticada
Route::get('/home-auth', [PostController::class, 'getPosts'])->middleware(['auth', 'verified'])->name('home-auth');


// Rutas para los posts propios del usuario autenticado
Route::get('/my-posts', [PostController::class, 'userPosts'])->middleware(['auth', 'verified'])->name('posts.user');

// Rutas para editar y actualizar posts
Route::get('/posts/{post}/edit', [PostController::class, 'edit'])->middleware(['auth', 'verified'])->name('posts.edit');
Route::put('/posts/{post}', [PostController::class, 'update'])->middleware(['auth', 'verified'])->name('posts.update');

// Rutas para crear y almacenar posts
Route::get('/posts/create', [PostController::class, 'create'])->middleware(['auth', 'verified'])->name('posts.create');
Route::post('/posts', [PostController::class, 'store'])->name('posts.store');

// Rutas para mostrar el detalle de un post y sus comentarios
Route::get('/posts/{post}', [PostController::class, 'show'])->middleware(['auth', 'verified'])->name('posts.show');
Route::post('/posts/{post}/comments', [CommentController::class, 'store'])->middleware(['auth', 'verified'])->name('comments.store');

// Rutas para editar y eliminar usuario
Route::middleware('auth')->group(function () {
  Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
  Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
  Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';
