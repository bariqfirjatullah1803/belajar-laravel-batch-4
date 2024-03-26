<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Belajar Laravel</title>
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
</head>

<body>
    {{-- Include file navbar --}}
    @include('partials.navbar')

    <main class="container" style="min-height: 100vh">
        {{-- Ini tempat page --}}
        {{-- Include file page --}}
        @yield('content')
    </main>

    {{-- Include file footer --}}
    @include('partials.footer')
    </script>
</body>

</html>
