@extends('layouts.app')
@section('content')
<div class="container">
    <form action="{{ url('/tipo/'.$tipo->id) }}" method="post" enctype="multipart/form-data">
    @csrf
    {{ method_field('PATCH') }}

    @include('tipo.form',['modo'=>'Editar'])

    </form>
</div>
@endsection