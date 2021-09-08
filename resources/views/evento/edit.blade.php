@extends('layouts.plantillabase')

@section('contenido')
<h2>EDITAR EVENTO</h2>

<form action="{{route('evento.update',$evento->id)}}" method="POST" enctype="multipart/form-data">
   
    @csrf
    @method('PUT')
  <div class="mb-3">
    <label for="" class="form-label">Nombre</label>
    <input id="nombre" name="nombre" type="text" class="form-control" tabindex="1" value="{{$evento->nombre}}">    
  </div>

  <div class="mb-3">
    <label for="" class="form-label">Ubicacion</label>
    <input id="ubicacion" name="ubicacion" type="text" class="form-control" tabindex="2" value="{{$evento->ubicacion}}">
  </div>
  
  <a href="/evento" class="btn btn-secondary" tabindex="5">Cancelar</a>
  <button type="submit" class="btn btn-primary" tabindex="4">Guardar</button>
</form>

@endsection
