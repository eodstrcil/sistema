@extends('layouts.app')
@section('content')
<div class="container">

    <form action="{{url('/tipo')}}" method="post" enctype="multipart/form-data">
    @csrf

    @include('tipo.form',['modo'=>'Crear'])

    </form>
</div>
@endsection