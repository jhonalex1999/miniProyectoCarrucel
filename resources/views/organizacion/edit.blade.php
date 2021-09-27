@extends('layouts.editar-eliminar')

@section('contenido')
<br><br><br>
<center>
   <div class="card" id="card">
     <h2>EDITAR ORGANIZACION</h2>
<br><br>
<form action="{{route('organizacion.update',$organizacion->id)}}" method="POST" enctype="multipart/form-data">
   
    @csrf
    @method('PUT')
  <div class="mb-3">
    <label for="" class="form-label">Nombre</label>
    <input id="nombre" name="nombre" type="text" class="input form-control" tabindex="1" value="{{$organizacion->nombre}}">    
  </div>
 <div class="mb-3">
    <img id="imagenEdit" src="{{asset('storage').'/'.$organizacion->imagen}}" alt="">
 
    <div class='flex items-center justify-center w-full'>
      
        <input name="imagen" id="imagen" type='file' class="input form-control" tabindex="2" value="{{$organizacion->imagen}}"/>
   
  </div>
  <div class="mb-3">
    <label for="" class="form-label">Ubicacion</label>
    <input id="ubicacion" name="ubicacion" type="text" class="input form-control" tabindex="3" value="{{$organizacion->ubicacion}}">
  </div>
  <div class="mb-3">
    <label for="" class="form-label">Telefono</label>
    <input id="telefono" name="telefono" type="number" class="input form-control" tabindex="3" value="{{$organizacion->telefono}}">
  </div>
 
  <button type="submit" class="btn btn-primary" tabindex="4">Guardar</button>
  <br><br>
 <a href="/organizacion" class="btn btn-danger" tabindex="5">Cancelar</a>
</form>
   </div>
  
</center>


@endsection
