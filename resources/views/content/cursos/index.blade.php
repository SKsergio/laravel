@extends('templates.app')

@push('css')
    <link rel="stylesheet" href="{{asset('css/cursos.css')}}">
@endpush

@section('content')
    <div class="container">

        <h1>Bienvenido usuario Random</h1>

        <div class="sections">
            <div class="sec">
                <h2>Boton de crear</h2>
    
                <a href="{{route('cursos')}}">
                    <button class="link_btn">Crear Curso</button>
                </a>
            </div>
    
            <div class="sec">
                <h2>Home </h2>
    
                <a href="{{route('home')}}">
                    <button class="link_btn">Home</button>
                </a>
            </div>
        </div>

    </div>
@endsection