<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CommentController extends Controller
{
  /**
   * Almacenar un nuevo comentario.
   */
  public function store(Request $request, Post $post)
  {
    // Validar el contenido del comentario
    $request->validate([
      'content' => 'required|string|max:500',
    ]);

    // Crear el comentario
    Comment::create([
      'post_id' => $post->id,
      'user_id' => Auth::id(),
      'content' => $request->content,
    ]);

    // Redirigir al detalle del post
    return redirect()->route('posts.show', $post->id)->with('success', 'Comentario agregado correctamente.');
  }

  /**
   * Eliminar un comentario.
   */
  // public function destroy(Comment $comment)
  // {
  //   // Verificar que el usuario sea dueño del comentario o administrador
  //   if (Auth::id() !== $comment->user_id && !Auth::user()->isAdmin()) {
  //     return redirect()->back()->with('error', 'No tienes permiso para eliminar este comentario.');
  //   }

  //   // Eliminar el comentario
  //   $comment->delete();

  //   return redirect()->back()->with('success', 'Comentario eliminado correctamente.');
  // }
}
