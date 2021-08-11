@extends('layouts.app')
@section('content')
<div class="container">
    <form action="{{ url('/institucion/'.$institucion->id) }}" method="post" enctype="multipart/form-data">
    @csrf
    {{ method_field('PATCH') }}

    @include('institucion.form',['modo'=>'Editar'])

    </form>
</div>
@endsection