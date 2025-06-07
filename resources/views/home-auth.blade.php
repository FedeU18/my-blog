@extends('layouts.app')

@section('content')
    <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
        <h1 class="text-3xl font-bold">Bienvenido a tu blog</h1>

        @auth
            <div class="mt-4">
                <a href="{{ route('posts.create') }}" class="px-5 py-2 bg-green-500 text-white rounded-md">
                    Crear Post
                </a>
            </div>
        @endauth

        <div class="mt-6">
            @foreach ($posts as $post)
                <div class="border p-4 rounded-md mb-4 bg-white">
                    <h2 class="text-xl font-semibold">{{ $post->title }}</h2>
                    <p>{{ $post->content }}</p>
                    @if ($post->image)
                        <img src="{{ asset('storage/' . $post->image) }}" alt="{{ $post->title }}"
                            class="mt-2 w-full max-w-sm" />
                    @endif
                </div>
            @endforeach
        </div>
    </div>
@endsection
