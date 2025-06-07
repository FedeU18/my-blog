@extends('layouts.app')

@section('content')
    <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8 text-white">
        <h1 class="text-3xl font-bold">Bienvenido a tu blog</h1>

        @auth
            <div class="mt-4">
                <a href="{{ route('posts.create') }}" class="px-5 py-2 bg-green-500  rounded-md">
                    Crear Post
                </a>
            </div>
        @endauth

        <div class="mt-6">
            @foreach ($posts as $post)
                <div class="post border border-gray-300 dark:border-gray-700 p-4 rounded-lg shadow-lg w-full">
                    <h2 class="">{{ $post->title }}</h2>
                    <p>{{ $post->content }}</p>
                    <p class="text-sm text-gray-500">Publicado por: {{ $post->user->name }}</p>
                    @if ($post->image)
                        <img src="{{ $post->image }}" alt="{{ $post->title }}"
                            class="mt-2 w-full max-w-sm rounded-md shadow" />
                    @endif
                </div>
            @endforeach
        </div>
    </div>
@endsection
