@extends('layouts.app')
@section('content')
<div class="container">

    <form action="{{url('/institucion')}}" method="post" enctype="multipart/form-data">
    @csrf

    @include('institucion.form',['modo'=>'Crear'])

    </form>
</div>
@endsection