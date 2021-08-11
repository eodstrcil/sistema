<h1>{{$modo}} tipo</h1>

@if(count($errors)>0)
    <div class="alert alert-danger" role="alert">
        <ul>
            @foreach( $errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach 
        </ul>
    </div>
@endif

<div class="form-group">
    <label for="Tipo">Tipo</label>
    <input type="text" class="form-control" name="Tipo" value="{{ isset($tipo->Tipo)?$tipo->Tipo:old('Tipo') }}" id="Tipo">
</div>

<input class="btn btn-success" type="submit" value="{{$modo}} datos">
<a class="btn btn-primary" href="{{ url('tipo/') }}">Regresar</a>

    <br>
</div>