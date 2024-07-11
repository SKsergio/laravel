@extends('templates.app')

@section('title', 'Crear Cursos')

@push('css')
    <link rel="stylesheet" href="{{asset('css/forms.css')}}">
@endpush

@section('content')
    <div class="container">
        <h1 class="my-9 text-5xl text-center">Crear cursos</h1>

        <div class="form_reg">
            <form action="{{route('cursos.store')}}" method="POST" class="form_course_register">
                @csrf

                <div class="container_inputs">
                    <div class="input_box">
                        <input type="text" name="course_name" required class="input_file">
                        <span>Nombre del curso</span>
                        <i></i>
                    </div>
    
                    <div class="input_box">
                        <input type="text" name="description" id="" class="input_file" required>
                        <span>Descripcion</span>
                        <i></i>
                    </div>
    
                    <div class="input_box">
                        <input type="text" name="category" id="" class="input_file" required>
                        <span>Categoria</span>
                        <i></i>
                    </div>

                </div>

                <div class="container_buttons">
                    <input type="submit" value="Enviar" class="btn my-3">

                    <button class="btn my-3 clean">Limpiar</button>
                </div>
               
                
            </form>
        </div>
    </div>
@endsection
