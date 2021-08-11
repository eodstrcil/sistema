@extends('layouts.app')
@section('content')
<div class="container">

    @if(Session::has('mensaje'))
    <div class="alert alert-success alert-dismissible" role="alert">
        {{ Session::get('mensaje')}}
        <button type="button" class="close" data-dismiss="alert" aroa-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
    @endif

    <a href="{{ url('evento/create') }}" class="btn btn-success">Registrar nuevo evento</a>
    <br><br>
    <table class="table table-light">
        <thead class="thead-light">
            <tr>
                <th>#</th>
                <th>Foto</th>
                <th>Titulo</th>
                <th>Descripcion</th>
                <th>Cuando</th>
                <th>Fecha Mostrar</th>
                <th>Fecha Ocultar</th>
                <th>Gratis</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach ( $eventos as $evento )
            <tr>
                <td>{{ $evento->id }}</td>
                <td>
                    <img class="img-thumbnail img-fluid" title="{{ $evento->Foto  }}"; ; width="100px" src="{{ asset('storage') . '/'. $evento->Foto }}" alt="">
                </td>
                <td>{{ $evento->Titulo }}</td>
                <td>{{ $evento->Descripcion }}</td>
                <td>{{ $evento->Cuando }}</td>
                <td>{{ $evento->FechaMostrar }}</td>
                <td>{{ $evento->FechaOcultar }}</td>
                <td>{{ $evento->Gratis }}</td>
                <td>
                    <a href="{{ url('/evento/'.$evento->id.'/edit') }}" class="btn btn-warning">Editar</a> | 
                    <form action="{{ url('/evento/' . $evento->id) }}" class="d-inline" method="post">
                        @csrf
                        {{ method_field('DELETE') }}
                        <input class="btn btn-danger" type="submit" onclick="return confirm('¿Quieres borrar?')" value="Borrar">
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    {!! $eventos->links() !!}
</div>
@endsection

