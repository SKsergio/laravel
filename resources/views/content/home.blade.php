@extends('templates.app')

@section('title', 'Home')

@push('css')
    <link rel="stylesheet" href="{{asset('css/home.css')}}">
@endpush

@section('content')

    <div class="container">

        <div class="welcome">
            <h1 class="my-9 text-4xl">Bienvenida</h1>

            <section class="info__cursos">
                <p class="mb-9">Lorem ipsum dolor sit amet consectetur adipisicing elit. Aut repudiandae assumenda dolore
                    quibusdam error tempore laudantium perspiciatis illum sapiente consequatur nam facilis,
                    pariatur animi voluptatibus beatae quod magni ratione debitis.</p>
                    
                    <a href="{{route('cursos')}}">
                        <button class="btn_cursos">
                            Cursos
                        </button>
                    </a>

            </section>
            
        </div>
    </div>

@endsection

