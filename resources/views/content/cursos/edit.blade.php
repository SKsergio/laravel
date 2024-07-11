@extends('templates.app')

@section('title', 'Editar Cursos')

@push('css')
    <link rel="stylesheet" href="{{asset('css/forms.css')}}">
@endpush

@section('content')
    <div class="container">
        <h1 class="my-9 text-5xl text-center">Editar cursos</h1>

        <div class="form_reg edit_form">
            <form action="{{route('cursos.update', $curso)}}" method="POST" class="form_course_register">
                @csrf
                @method('put') {{--esto es escencial cuando estamos trabajando con formularios de actualizacion ya que nos permite mandarlo con un metodo put--}}

                <div class="container_inputs">
                    <div class="input_box">
                        <input type="text" name="course_name" value="{{old('name', $curso->name)}}" required class="input_file">
                        <span>Nombre del curso</span>
                        <i></i>
                        @error('name')
                            <span>{{$message}}</span>  {{--With rhis form we can validate the forms, is better js xd--}}
                        @enderror
                    </div>
    
                    <div class="input_box">
                        <input type="text" name="description" value="{{old('name', $curso->description)}}" id="" class="input_file" required>
                        <span>Descripcion</span>
                        <i></i>
                    </div>
    
                    <div class="input_box">
                        <input type="text" name="category" value="{{old('name', $curso->categoria)}}" id="" class="input_file" required>
                        <span>Categoria</span>
                        <i></i>
                    </div>

                </div>

                <div class="container_buttons">
                    <input type="submit" value="Actualizar" class="btn my-3">

                    <a href="{{(route('cursos'))}}">
                        <button class="btn my-3 clean">Cancelar</button>
                    </a>
                </div>
               
                
            </form>
        </div>
    </div>
@endsection
