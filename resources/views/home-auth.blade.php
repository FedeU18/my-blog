@extends('layouts.app')

@section('content')
    <div class="w-full text-white">
        <h1 class="pt-5 font-bold !text-3xl">Bienvenido a tu blog</h1>


        <div class="mt-6">
            @foreach ($posts as $post)
                <div class="post border-b border-gray-300 dark:border-gray-700 p-4 my-5 shadow-lg w-full ">
                    <h3 class="!text-xl mt-4 text-gray-500">{{ $post->user->name }} </h3>
                    <h2 class="!text-2xl mt-4">{{ $post->title }}</h2>
                    <p class="mt-4">{{ $post->content }}</p>
                    @if ($post->image)
                        <img src="{{ $post->image }}" alt="{{ $post->title }}"
                            class="mt-4 w-1/2 max-w-sm rounded-md shadow mx-auto block">
                    @endif
                </div>
            @endforeach
        </div>
    </div>
@endsection
