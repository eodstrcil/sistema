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

    <a href="{{ url('tipo/create') }}" class="btn btn-success">Registrar nuevo tipo</a>
    <br><br>
    <table class="table table-light">
        <thead class="thead-light">
            <tr>
                <th>#</th>
                <th>Tipo</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach ( $tipos as $tipo )
            <tr>
                <td>{{ $tipo->id }}</td>
                <td>{{ $tipo->Tipo }}</td>
                <td>
                    <a href="{{ url('/tipo/'.$tipo->id.'/edit') }}" class="btn btn-warning">Editar</a> | 
                    <form action="{{ url('/tipo/' . $tipo->id) }}" class="d-inline" method="post">
                        @csrf
                        {{ method_field('DELETE') }}
                        <input class="btn btn-danger" type="submit" onclick="return confirm('¿Quieres borrar?')" value="Borrar">
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    {!! $tipos->links() !!}
</div>
@endsection