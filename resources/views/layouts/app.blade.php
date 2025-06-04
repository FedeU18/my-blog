<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>
        @yield('title', 'My Blog')
    </title>
    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>

</head>

<body class="min-h-screen flex flex-col">

    <header class="bg-gray-800 text-white p-4 flex justify-between items-center">
        <h1>My blog</h1>
        <nav class="flex space-x-4 flex-row">
            <ul class="flex space-x-4 flex-row">
                <li><a href="{{ url('/') }}">Home</a></li>
                <li><a href="{{ url('/posts') }}">Posts</a></li>
                <li><a href="{{ url('/about') }}">About</a></li>
                <li><a href="{{ url('/contact') }}">Contact</a></li>
            </ul>
        </nav>
    </header>

    <!-- Contenido principal que crece para llenar el espacio -->
    <main class="flex-grow px-16 py-8 bg-gray-700 text-white">
        @yield('content')
    </main>

    <footer class="bg-gray-800 text-white p-4 text-center">
        <p>&copy; {{ date('Y') }} My Blog. All rights reserved.</p>
    </footer>

</body>


</html>
