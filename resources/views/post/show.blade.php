@extends('layouts.app')
@section('title', $post->title)
@section('content')
    <div class="w-full mx-auto py-12 text-white mt-6 p-6 rounded-lg shadow-lg bg-gray-900">
        <h1 class="text-3xl font-bold">{{ $post->title }}</h1>
        <h3 class="text-xl text-gray-400 mt-2">Publicado por: {{ $post->user->name }}</h3>

        <p class="mt-4">{{ $post->content }}</p>

        @if ($post->image)
            <img src="{{ $post->image }}" alt="{{ $post->title }}"
                class="mt-4 w-1/2 max-w-sm rounded-md shadow mx-auto block">
        @endif

        <!-- Sección de comentarios -->
        <div class="mt-8 border-t border-gray-600 pt-6">
            <h2 class="text-2xl font-bold">Comentarios</h2>

            @if ($post->comments && $post->comments->isEmpty())
                <p class="text-gray-400 mt-4">No hay comentarios aún. ¡Sé el primero en comentar!</p>
            @else
                @foreach ($post->comments as $comment)
                    <div class="border border-gray-600 p-4 rounded-md mt-4 bg-gray-800">
                        <p class="text-sm text-gray-400">{{ $comment->user->name }}</p>
                        <p class="text-white mt-2">{{ $comment->content }}</p>
                    </div>
                @endforeach
            @endif

            <!-- Formulario para agregar comentarios -->
            @auth
                <form action="{{ route('comments.store', $post->id) }}" method="POST" class="mt-6">
                    @csrf
                    <textarea name="content" rows="3"
                        class="block w-full border-gray-600 dark:bg-gray-800 text-white rounded-md shadow-sm px-4 py-2"
                        placeholder="Escribe un comentario..." required></textarea>

                    <!-- Botón centrado -->
                    <div class="flex justify-center mt-4">
                        <button type="submit"
                            class="px-6 py-2 dark:bg-gray-800 text-white border dark:border-gray-600 rounded-md dark:shadow-sm hover:bg-gray-500 transition">
                            Publicar Comentario
                        </button>
                    </div>
                </form>
            @endauth
        </div>
    </div>
@endsection
