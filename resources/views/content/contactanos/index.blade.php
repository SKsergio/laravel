@extends('templates.app')

@section('title', 'Contactanos')

@push('css')
    <link rel="stylesheet" href="{{asset('css/forms.css')}}">
@endpush

@section('content')
    <div class="container">
        <h1 class="my-9 text-5xl text-center">Contactanos!!</h1>

        <div class="form_reg contact_form">
            <form action="{{route('contactanos.store')}}" method="POST" class="form_course_register">
                @csrf

                <div class="container_inputs">
                    <div class="input_box">
                        <input type="text" name="name" required class="input_file">
                        <span>Nombre</span>
                        <i></i>
                        @error('name')
                            <span>{{$message}}</span>  {{--With rhis form we can validate the forms, is better js xd--}}
                        @enderror
                    </div>
    
                    <div class="input_box">
                        <input type="email" name="email"  id="" class="input_file" required>
                        <span>Correo</span>
                        <i></i>
                    </div>
    
                    <div class="input_box">
                        <input type="text" name="message" id="" class="input_file" required>
                        <span>Mensaje</span>
                        <i></i>
                    </div>

                </div>

                <div class="container_buttons">
                    <input type="submit" value="Enviar Mensaje" class="btn my-3">

                </div>
               
                
            </form>
        </div>
    </div>
@endsection
