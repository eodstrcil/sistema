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

    <a href="{{ url('institucion/create') }}" class="btn btn-success">Registrar nueva institucion</a>
    <br><br>
    <table class="table table-light">
        <thead class="thead-light">
            <tr>
                <th>#</th>
                <th>Nombre</th>
                <th>URL</th>
                <th>Direccion</th>
                <th>Latitud</th>
                <th>Longitud</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach ( $instituciones as $institucion )
            <tr>
                <td>{{ $institucion->id }}</td>
                <td>{{ $institucion->Nombre }}</td>
                <td>{{ $institucion->URL }}</td>
                <td>{{ $institucion->Direccion }}</td>
                <td>{{ $institucion->Latitud }}</td>
                <td>{{ $institucion->Longitud }}</td>
                <td>
                    <a href="{{ url('/institucion/'.$institucion->id.'/edit') }}" class="btn btn-warning">Editar</a> | 
                    <form action="{{ url('/institucion/' . $institucion->id) }}" class="d-inline" method="post">
                        @csrf
                        {{ method_field('DELETE') }}
                        <input class="btn btn-danger" type="submit" onclick="return confirm('¿Quieres borrar?')" value="Borrar">
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    {!! $instituciones->links() !!}
</div>
@endsection

