@extends('layouts.app')

@section('title', 'Crear Post')

@section('content')
    <div
        class="max-w-4xl mx-auto py-12 text-white border border-gray-300 dark:border-gray-700 p-6 rounded-lg dark:shadow-lg bg-gray-900">
        <h1 class="!text-3xl font-bold mb-6">Crear un nuevo post</h1>

        <form action="{{ route('posts.store') }}" method="POST" enctype="multipart/form-data" class="space-y-6">
            @csrf

            <!-- Título -->
            <div>
                <label for="title" class="block text-sm font-medium text-gray-50">Título</label>
                <input type="text" name="title" id="title"
                    class="mt-1 block w-full dark:border-gray-600 dark:bg-gray-800 text-white rounded-md shadow-sm px-4 py-2"
                    placeholder="Escribe el título aquí" required>
                @error('title')
                    <span class="text-red-500 text-sm">{{ $message }}</span>
                @enderror
            </div>

            <!-- Contenido -->
            <div>
                <label for="content" class="block text-sm font-medium text-gray-50">Contenido</label>
                <textarea name="content" id="content" rows="4"
                    class="mt-1 block w-full dark:border-gray-600 dark:bg-gray-800 text-white rounded-md shadow-sm px-4 py-2"
                    placeholder="Escribe el contenido aquí" required></textarea>
                @error('content')
                    <span class="text-red-500 text-sm">{{ $message }}</span>
                @enderror
            </div>

            <!-- Imagen -->
            <div>
                <label for="image" class="block text-sm font-medium text-gray-50">Imagen (Opcional)</label>
                <input type="file" name="image" id="image"
                    class="mt-1 block w-full border-gray-600 cursor-pointer dark:bg-gray-800 text-white rounded-md shadow-sm px-4 py-2">
                @error('image')
                    <span class="text-red-500 text-sm">{{ $message }}</span>
                @enderror
            </div>

            <!-- Botón de envío -->
            <div class="flex justify-center border-t border-gray-600 pt-6 mt-6">
                <button type="submit"
                    class="px-6 py-2 dark:bg-gray-800 text-white border dark:border-gray-600 rounded-md dark:shadow-sm hover:bg-gray-500 transition">
                    🚀 Publicar Post
                </button>
            </div>
        </form>
    </div>
@endsection
