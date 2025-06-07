<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class PostController extends Controller
{

  /**
   * Display a listing of the resource.
   */
  public function index()
  {
    $posts = Post::with('user')->latest()->paginate(5); // Muestra 5 posts por página
    return view('home', compact('posts'));
  }
  public function getPosts()
  {
    $posts = Post::with('user')->latest()->paginate(5); // Agrega paginación en home-auth
    return view('home-auth', compact('posts'));
  }

  public function userPosts()
  {
    $posts = Post::where('user_id', Auth::id())->latest()->paginate(5);
    return view('post.user', compact('posts'));
  }

  /**
   * Show the form for creating a new resource.
   */
  public function create()
  {
    return view('post.create');
  }

  /**
   * Store a newly created resource in storage.
   */



  public function store(Request $request)
  {
    $request->validate([
      'title' => 'required|string|max:255',
      'content' => 'required|string',
      'image' => 'nullable|image|max:2048', // Permite imágenes opcionales
    ]);

    $imageUrl = null; // Inicializa la variable de la imagen

    // Subir la imagen a ImgBB si existe
    if ($request->hasFile('image')) {
      $imageFile = $request->file('image')->path();

      // Hacer la solicitud a ImgBB
      $response = Http::attach(
        'image',
        file_get_contents($imageFile),
        $request->file('image')->getClientOriginalName()
      )->post("https://api.imgbb.com/1/upload", [
        'key' => env('IMGBB_API_KEY'),
        // Puedes modificar el tiempo de expiración si lo deseas
      ]);

      // Si la respuesta es exitosa, obtener la URL de la imagen
      if ($response->successful()) {
        $imageUrl = $response->json('data.url');
      } else {
        return back()->withErrors(['image' => 'Error al subir la imagen a ImgBB.']);
      }
    }

    // Guardar el post en la base de datos
    $post = new Post();
    $post->title = $request->title;
    $post->content = $request->content;
    $post->user_id = Auth::id();
    $post->image = $imageUrl; // Guarda la URL de ImgBB

    $post->save();

    return redirect()->route('home-auth')->with('success', 'Post creado correctamente.');
  }


  /**
   * Display the specified resource.
   */
  public function show(Post $post)
  {
    $post->load('comments'); // Esto asegura que los comentarios se carguen correctamente
    return view('post.show', compact('post'));
  }

  /**
   * Show the form for editing the specified resource.
   */
  public function edit(Post $post)
  {
    return view('post.edit', compact('post'));
  }

  public function update(Request $request, Post $post)
  {
    // Validar los datos ingresados
    $request->validate([
      'title' => 'required|string|max:255',
      'content' => 'required|string',
      'image' => 'nullable|image|max:2048', // Permite imágenes opcionales
    ]);

    $imageUrl = $post->image; // Mantiene la imagen actual si no se sube una nueva

    // Subir la nueva imagen si el usuario adjunta una
    if ($request->hasFile('image')) {
      $imageFile = $request->file('image')->path();

      // Hacer la solicitud a ImgBB
      $response = Http::attach(
        'image',
        file_get_contents($imageFile),
        $request->file('image')->getClientOriginalName()
      )->post("https://api.imgbb.com/1/upload", [
        'key' => env('IMGBB_API_KEY'),
      ]);

      // Si la subida fue exitosa, obtener la nueva URL de la imagen
      if ($response->successful()) {
        $imageUrl = $response->json('data.url');
      } else {
        return back()->withErrors(['image' => 'Error al subir la imagen a ImgBB.']);
      }
    }

    // Actualizar el post con los nuevos datos
    $post->update([
      'title' => $request->title,
      'content' => $request->content,
      'image' => $imageUrl, // Usa la nueva imagen si se subió, o mantiene la existente
    ]);

    return redirect()->route('posts.user')->with('success', 'Post actualizado correctamente.');
  }



  /**
   * Remove the specified resource from storage.
   */
  public function destroy(string $id)
  {
    //
  }
}
