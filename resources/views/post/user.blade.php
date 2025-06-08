@extends('layouts.app')
@section('title', 'Mis Publicaciones')
@section('content')
    <div class="w-full text-white">
        <h1 class="pt-5 font-bold text-3xl">Mis publicaciones</h1>

        <div class="mt-6">
            @if ($posts->isEmpty())
                <p class="text-center text-gray-400 text-lg">No has creado ningún post aún.</p>
            @else
                @foreach ($posts as $post)
                    <div
                        class="post border-b border-gray-300 dark:border-gray-700 p-4 my-5 shadow-lg w-full flex flex-row justify-between items-center">
                        <h2 class="!text-2xl mt-4">
                            <a href="{{ route('posts.show', $post->id) }}" class="text-indigo-500 hover:underline">
                                {{ $post->title }}
                            </a>
                        </h2>

                        <!-- Botón para editar el post -->
                        <div class="mt-4 flex justify-end">
                            <a href="{{ route('posts.edit', $post->id) }}"
                                class="px-4 py-2 bg-gray-600 text-white rounded-md shadow-sm hover:bg-gray-700 transition">
                                Editar Post
                            </a>
                        </div>
                    </div>
                @endforeach
            @endif

            <!-- Enlaces de paginación -->
            <div class="mt-8 flex justify-center">
                {{ $posts->links() }} <!-- Laravel genera los enlaces automáticamente -->
            </div>
        </div>
    </div>
@endsection
