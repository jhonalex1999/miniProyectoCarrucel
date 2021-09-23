@extends('layouts.editar-eliminar')

@section('contenido')
<h2>EDITAR CANASTA</h2>

<form action="{{route('canasta.update',$canasta->id)}}" method="POST" enctype="multipart/form-data">
   
    @csrf
    @method('PUT')
  <div class="mb-3">
    <label for="" class="form-label">Nombre</label>
    <input id="nombre" name="nombre" type="text" class="form-control" tabindex="1" value="{{$canasta->nombre}}">    
  </div>
  <div class="mb-3">
    <img src="{{asset('storage').'/'.$canasta->imagen}}" alt="">
    <label for="" class="form-label"></label> 
    <div class='flex items-center justify-center w-full'>
      
        <input name="imagen" id="imagen" type='file' class="form-control" tabindex="2" value="{{$canasta->imagen}}"/>
   
  </div>
  <div class="mb-3">
    <label for="" class="form-label">Cantidad</label>
    <input id="cantidad" name="cantidad" type="number" class="form-control" tabindex="3" value="{{$canasta->cantidad}}">
  </div>
  <div class="mb-3">
    <label for="" class="form-label">Precio</label>
    <input id="precio" name="precio" type="number"  class="form-control" tabindex="3" value="{{$canasta->precio}}">
  </div>
  <a href="/canasta" class="btn btn-secondary" tabindex="5">Cancelar</a>
  <button type="submit" class="btn btn-primary" tabindex="4">Guardar</button>
</form>

@endsection
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script> 
<script>   
    $(document).ready(function (e) {   
        $('#imagen').change(function(){            
            let reader = new FileReader();
            reader.onload = (e) => { 
                $('#imagenSeleccionada').attr('src', e.target.result); 
            }
            reader.readAsDataURL(this.files[0]); 
        });
    });
</script>