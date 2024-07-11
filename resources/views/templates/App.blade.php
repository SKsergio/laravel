<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title', 'Cursos')</title>
    {{-- general css --}}
    <link rel="stylesheet" href="{{asset('css/normalice.css')}}">
    <link rel="stylesheet" href="{{asset('css/layaout.css')}}">
    <link rel="stylesheet" href="{{asset('css/menu.css')}}">
    {{-- especific css --}}
    @stack('css')

</head>
<body>
    <header>
        {{-- menu component --}}
        <x-menu></x-menu>
    </header>

    <main>
        @yield('content')
    </main>


    <footer>

    </footer>

    {{-- especific js --}} 
    @stack('js')
    <script src="https://cdn.tailwindcss.com"></script>
</body>
</html>