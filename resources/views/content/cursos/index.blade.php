@extends('templates.app')

@push('css')
    <link rel="stylesheet" href="{{asset('css/cursos.css')}}">
@endpush

@section('content')
    <div class="container">

        <h1 class="my-9 text-4xl">Bienvenido usuario Random</h1>

        <div class="table_container">
            <div class="card_header">

                <a href="{{route('cursos.crear')}}">
                    <button class="link_btn">Crear Curso</button>
                </a>
            </div>

            <div class="card_body">

                <table class="table my-9">
                    <thead>
                        <tr>
                            <th>Nombre</th>
                            <th>Categoria</th>
                            <th>Fecha de creación</th>
                            <th>Fecha de actualización</th>
                            <th>Acciones</th>
                        </tr>               
                    </thead>
                    <tbody >
                        @foreach ($cursos1 as $item)
                            <tr>
                                <td>{{$item->name}}</td>
                                <td>{{$item->categoria}}</td>
                                <td>{{$item->created_at}}</td>
                                <td>{{$item->updated_at}}</td>
                                <td class="btn_list_conatiner"> 
                                    <a href="{{route('cursos.show', $item)}}">
                                        <button class="link_btn show">visualizar</button>
                                    </a>
                                    <a href="{{route('cursos.edit', $item)}}">
                                        <button class="link_btn update">Editar</button>
                                    </a>
                                    <form action="{{route('cursos.destroy', $item)}}" method="post">
                                        @csrf
                                        @method('delete')
                                        <button type="submit" class="link_btn delete">Eliminar</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                       
                    </tbody>
                 </table> 

                 {{$cursos1->links()}}
            </div>
        </div>
        
    </div>
@endsection