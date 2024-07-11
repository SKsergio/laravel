@extends('templates.app')

@push('css')
    <link rel="stylesheet" href="{{asset('css/cursos.css')}}">
@endpush

@section('title', 'Curso ' . $curso->name)

@section('content')
    <div class="container">
        <h1 class="my-9 text-4xl">Bienvenido al curso Numero: {{$curso->id}}</h1>  

        <section class="information">

            <div class="box_information">
                <h2>Nombre: <span class="text_strong">{{$curso->name}}</span></h2>
            </div>

            <div class="box_information">
                <h2>Descripcion</h2>
                <p class="text_strong">{{$curso->description}}</p>
            </div>

            <div class="box_information">
                <h2>categoria :<span class="text_strong">{{$curso->categoria}}</span></h2>
            </div>

            <div class="box_information fechas_container">
                <section class="fecha">
                    <h2>Fecha de creación</h2>
                    <p class="text_strong">{{$curso->created_at}}</p>
                </section>
                
                <section class="fecha">
                    <h2>Ultima actualización</h2>
                    <p class="text_strong">{{$curso->updated_at}}</p>
                </section>
            </div>

            <div class="box_information butons_conatiner">
                <a href="{{route('cursos')}}">
                    <button class="link_btn return">Volver</button>
                </a>
                <a href="{{route('cursos.edit', $curso)}}">
                    <button class="link_btn update">Editar</button>
                </a>
                <a href="{{route('cursos')}}">
                    <button class="link_btn delete">Eliminar</button>
                </a>
            </div>

            

        </section>

    </div>
    
@endsection
