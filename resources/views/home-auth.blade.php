@extends('layouts.app')
@section('title', 'Inicio')


@section('content')
    <div class="w-full text-white">
        <h1 class="pt-5 font-bold !text-3xl">Bienvenido a tu blog</h1>


        <div class="mt-6">
            @if ($posts->isEmpty())
                <p class="text-center text-gray-400 text-lg">No hay publicaciones aún. ¡Sé el primero en crear una!</p>
            @else
                @foreach ($posts as $post)
                    <div class="post border-b border-gray-300 dark:border-gray-700 p-4 my-5 shadow-lg w-full">
                        <p class="!text-sm dark:text-gray-400">{{ $post->user->name }}</p>

                        <h2 class="!text-2xl mt-4">
                            <a href="{{ route('posts.show', $post->id) }}" class="text-indigo-500 hover:underline">
                                {{ $post->title }}
                            </a>
                        </h2>
                    </div>
                @endforeach
            @endif
            <!-- Enlaces de paginación -->
            <div class="my-8 flex justify-center">
                {{ $posts->links() }} <!-- Laravel genera los enlaces automáticamente -->
            </div>

        </div>

    </div>
@endsection
