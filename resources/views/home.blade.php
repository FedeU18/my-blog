<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Laravel</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=instrument-sans:400,500,600" rel="stylesheet" />
    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
    <!-- Styles / Scripts -->
    @if (file_exists(public_path('build/manifest.json')) || file_exists(public_path('hot')))
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    @endif
</head>

<body class="bg-[#FDFDFC] dark:bg-gray-900 text-[#1b1b18] flex items-center lg:justify-center min-h-screen flex-col">
    <header
        class="w-full p-2 text-sm mb-6 not-has-[nav]:hidden bg-white dark:bg-gray-800 border-b border-gray-100 dark:border-gray-700">
        @if (Route::has('login'))
            <nav class="flex items-center justify-between gap-4 px-4">
                <div class="shrink-0 flex items-center pl-4">
                    <img src="{{ asset('images/logo.png') }}" alt="Logo" class="h-16 w-auto">
                </div>
                <div class="flex items-center gap-4">
                    @auth
                        <a href="{{ url('/home-auth') }}"
                            class="inline-block px-5 py-1.5 dark:text-[#EDEDEC] border-[#19140035] hover:border-[#1915014a] border text-[#1b1b18] dark:border-[#3E3E3A] dark:hover:border-[#62605b] rounded-sm text-sm leading-normal">
                            Home
                        </a>
                    @else
                        <a href="{{ route('login') }}"
                            class="inline-block px-5 py-1.5 dark:text-[#EDEDEC] text-[#1b1b18] border border-transparent hover:border-[#19140035] dark:hover:border-[#3E3E3A] rounded-sm text-sm leading-normal">
                            Log in
                        </a>

                        @if (Route::has('register'))
                            <a href="{{ route('register') }}"
                                class="inline-block px-5 py-1.5 dark:text-[#EDEDEC] border-[#19140035] hover:border-[#1915014a] border text-[#1b1b18] dark:border-[#3E3E3A] dark:hover:border-[#62605b] rounded-sm text-sm leading-normal">
                                Register
                            </a>
                        @endif
                    @endauth
                </div>
            </nav>
        @endif
    </header>

    <div
        class="flex items-center justify-center w-full transition-opacity opacity-100 duration-750 lg:grow starting:opacity-0">
        <main class="flex max-w-[335px] w-full flex-col-reverse lg:max-w-4xl lg:flex-row">
            <div class="container w-full text-white flex flex-col gap-4 p-4 lg:p-8">
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

            </div>
        </main>
    </div>

    @if (Route::has('login'))
        <div class="h-14.5 hidden lg:block"></div>
    @endif
</body>

</html>
