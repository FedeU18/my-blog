@extends('layouts.app')

@section('content')
    <div class="w-full text-white">
        <h1 class="pt-5 font-bold !text-3xl">Bienvenido a tu blog</h1>


        <div class="mt-6">
            @foreach ($posts as $post)
                <div class="post border-b border-gray-300 dark:border-gray-700 p-4 my-5 shadow-lg w-full ">
                    <h2 class="!text-2xl mt-4">
                        <a href="{{ route('posts.show', $post->id) }}" class="text-indigo-500 hover:underline">
                            {{ $post->title }}
                        </a>
                    </h2>
                </div>
            @endforeach
        </div>
    </div>
@endsection
