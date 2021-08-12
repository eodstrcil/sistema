<h1>{{$modo}} evento</h1>

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

    <label for="Titulo">Titulo</label>
    <input type="text" class="form-control" name="Titulo" value="{{ isset($evento->Titulo)?$evento->Titulo:old('Titulo') }}" id="Titulo">
</div>

<div class="form-group">
    <label for="Descripcion">Descripción</label>
    <input type="text" class="form-control" name="Descripcion" value="{{ isset($evento->Descripcion)?$evento->Descripcion:old('Descripcion') }}" id="Descripcion">
</div>

<div class="form-group">
    <label for="IdTipo">Tipo de evento</label>
    <select class="form-control" name="IdTipo" id="IdTipo">
        <option value="0">General</option>
        @foreach($tipos as $tipo)
            @if(isset($evento->IdTipo))
                @if($evento->IdTipo == $tipo['id'] )
                    <option selected value="{{ $tipo['id'] }}">{{ $tipo['Tipo']}}</option>
                @else
                    <option value="{{ $tipo['id'] }}">{{ $tipo['Tipo']}}</option>
                @endif
            @else
                <option value="{{ $tipo['id'] }}">{{ $tipo['Tipo']}}</option>
            @endif
        @endforeach
    </select>
</div>

<div class="form-group">
    <label for="IdInstitucion">Institucion</label>
    <select class="form-control" name="IdInstitucion" id="IdInstitucion">
        <option value="0">Ninguna</option>
        @foreach($instituciones as $institucion) 
            @if(isset($evento->IdTipo))           
                @if($evento->IdInstitucion == $institucion['id'] )
                    <option selected value="{{ $institucion['id'] }}">{{ $institucion['Nombre']}}</option>
                @else
                    <option value="{{ $institucion['id'] }}">{{ $institucion['Nombre']}}</option>
                @endif
            @else
                <option value="{{ $institucion['id'] }}">{{ $institucion['Nombre']}}</option>
            @endif
        @endforeach
    </select>
</div>

<div class="form-group">
    <label for="Cuando">Cuando</label>
    <input type="text" class="form-control" title="Exprese en fecha o rango de fechas" placeholder='"fecha1":"2021.04.01 15:00:00"' name="Cuando" value="{{ isset($evento->Cuando)?$evento->Cuando:old('Cuando') }}" id="Cuando">
</div>

<div class="form-group">
    <label for="FechaMostrar">Fecha Mostrar</label>
    <input type="text" class="form-control" name="FechaMostrar" placeholder="dd/mm/yyy" value="{{ isset($evento->FechaMostrar)?$evento->FechaMostrar:old('FechaMostrar') }}" id="FechaMostrar">
</div>

<div class="form-group">
    <label for="FechaOcultar">Fecha Ocultar</label>
    <input type="text" class="form-control" name="FechaOcultar" placeholder="dd/mm/yyy" value="{{ isset($evento->FechaOcultar)?$evento->FechaOcultar:old('FechaOcultar') }}" id="FechaOcultar">
</div>

<div class="form-group">
    <label for="Gratis">Gratis</label>
    <select class="form-control" name="Gratis" id="Gratis">
        @if(isset($evento->Gratis) == 1 || old('Gratis') == 1)
            <option value="1" selected>Si</option>
            <option value="0">No</option>
        @else
            <option value="1">Si</option>
            <option value="0" selected>No</option>
        @endif
    </select>
    <!--<input type="text" class="form-control" name="Gratis" value="{{ isset($evento->Gratis)?$evento->Gratis:old('Gratis') }}" id="Gratis">-->
</div>

<div class="form-group">
    <label for="Foto">Foto</label>
    @if(isset($evento->Foto))
    <img title="{{ $evento->Foto  }}" width="100px" src="{{ asset('storage') . '/'. $evento->Foto }}" alt="">
    @endif
    <input type="file" class="form-control" name="Foto" value="" id="Foto">
</div>

<input class="btn btn-success" type="submit" value="{{$modo}} datos">
<a class="btn btn-primary" href="{{ url('evento/') }}">Regresar</a>

    <br>
</div>