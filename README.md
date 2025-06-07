@extends('layouts.app')

@section('content')
<div class="w-full max-w-sm mx-auto bg-gray-900 text-white p-6 rounded-lg shadow-lg">

        <h1 class="text-xl font-bold mb-4 text-center">Crear un nuevo post</h1>

        <form action="{{ route('posts.store') }}" method="POST" enctype="multipart/form-data" class="space-y-4">
            @csrf

            <!-- Título -->
            <div>
                <label for="title" class="block text-sm font-medium text-gray-300">Título</label>
                <input type="text" name="title" id="title"
                    class="mt-1 block w-full text-sm border-gray-600 bg-gray-800 text-white rounded-md shadow-sm px-3 py-1.5"
                    placeholder="Escribe el título aquí" required>
                @error('title')
                    <span class="text-red-500 text-xs">{{ $message }}</span>
                @enderror
            </div>

            <!-- Contenido -->
            <div>
                <label for="content" class="block text-sm font-medium text-gray-300">Contenido</label>
                <textarea name="content" id="content" rows="3"
                    class="mt-1 block w-full text-sm border-gray-600 bg-gray-800 text-white rounded-md shadow-sm px-3 py-1.5"
                    placeholder="Escribe el contenido aquí" required></textarea>
                @error('content')
                    <span class="text-red-500 text-xs">{{ $message }}</span>
                @enderror
            </div>

            <!-- Imagen -->
            <div>
                <label for="image" class="block text-sm font-medium text-gray-300">Imagen (Opcional)</label>
                <input type="file" name="image" id="image"
                    class="mt-1 block w-full text-sm border-gray-600 bg-gray-800 text-white rounded-md shadow-sm px-3 py-1.5">
                @error('image')
                    <span class="text-red-500 text-xs">{{ $message }}</span>
                @enderror
            </div>

            <!-- Botón de envío -->
            <div class="flex justify-center">
                <button type="submit"
                    class="px-4 py-2 bg-indigo-600 text-white rounded-md font-bold hover:bg-indigo-700 shadow-md transition">
                    🚀 Publicar Post
                </button>
            </div>
        </form>
    </div>

@endsection
