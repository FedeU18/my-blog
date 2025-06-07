<?php

namespace App\Http\Controllers;

use App\Models\Post;

use Illuminate\Http\Request;

class PostController extends Controller
{
  /**
   * Display a listing of the resource.
   */

  public function index()
  {
    $posts = Post::all(); // Recupera todos los posts
    return view('home', compact('posts'));
  }

  public function getPosts()
  {
    $posts = Post::all(); // Recupera todos los posts
    return view('home-auth', compact('posts'));
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
    //
  }

  /**
   * Display the specified resource.
   */
  public function getPostById(string $id)
  {
    // Here you would typically fetch the post by ID from the database.
    // For now, we'll just return a view with the post ID.
    return view('post.show', ['id' => $id]);
  }

  /**
   * Show the form for editing the specified resource.
   */
  public function edit(string $id)
  {
    // Here you would typically fetch the post by ID from the database.
    // For now, we'll just return a view with the post ID.
    return view('post.edit', ['id' => $id]);
  }

  /**
   * Update the specified resource in storage.
   */
  public function update(Request $request, string $id)
  {
    //
  }

  /**
   * Remove the specified resource from storage.
   */
  public function destroy(string $id)
  {
    //
  }
}
