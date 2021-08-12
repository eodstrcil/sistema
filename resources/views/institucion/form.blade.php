<h1>{{$modo}} institucion</h1>

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
    <label for="Nombre">Nombre</label>
    <input type="text" class="form-control" name="Nombre" value="{{ isset($institucion->Nombre)?$institucion->Nombre:old('Nombre') }}" id="Nombre">
</div>

<div class="form-group">
    <label for="URL">URL</label>
    <input type="text" class="form-control" name="URL" value="{{ isset($institucion->URL)?$institucion->URL:old('URL') }}" id="URL">
</div>

<div class="form-group">
    <label for="Direccion">Dirección</label>
    <input type="text" class="form-control" name="Direccion" value="{{ isset($institucion->Direccion)?$institucion->Direccion:old('Direccion') }}" id="Direccion">
</div>

<div class="form-group">
    <label for="IframeMapa">Script de iFrame - Mapa Google</label>
    <input type="text" class="form-control" name="IframeMapa" value="{{ isset($institucion->IframeMapa)?$institucion->IframeMapa:old('IframeMapa') }}" id="IframeMapa">
</div>

<div class="form-group">
    <label for="Latitud">Latitud</label>
    <input type="text" class="form-control" name="Latitud" value="{{ isset($institucion->Latitud)?$institucion->Latitud:old('Latitud') }}" id="Latitud">
</div>

<div class="form-group">
    <label for="Longitud">Longitud</label>
    <input type="text" class="form-control" name="Longitud" value="{{ isset($institucion->Longitud)?$institucion->Longitud:old('Longitud') }}" id="Longitud">
</div>


<input class="btn btn-success" type="submit" value="{{$modo}} datos">
<a class="btn btn-primary" href="{{ url('institucion/') }}">Regresar</a>

    <br>
</div>