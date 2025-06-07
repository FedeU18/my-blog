@extends('layouts.app')

@section('content')
    <div class="w-full text-white">
        <h1 class="pt-5 font-bold !text-3xl">Bienvenido a tu blog</h1>


        <div class="mt-6">
            @foreach ($posts as $post)
                <div class="post border border-gray-300 dark:border-gray-700 p-4 my-5 rounded-lg shadow-lg w-full">
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
