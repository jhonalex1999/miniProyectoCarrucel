@extends('layouts.plantillabase')

@section('contenido')
<h2>EDITAR INVERSIONISTA</h2>

<form action="{{route('inversionista.update',$inversionista->id)}}" method="POST" enctype="multipart/form-data">
   
    @csrf
    @method('PUT')
  <div class="mb-3">
    <label for="" class="form-label">Nombre</label>
    <input id="nombre" name="nombre" type="text" class="form-control" tabindex="1" value="{{$inversionista->nombre}}">    
  </div>
  <div class="mb-3">
    <img src="{{asset('storage').'/'.$inversionista->imagen}}" alt="">
    <label for="" class="form-label">Imagen</label> 
    <div class='flex items-center justify-center w-full'>
      
        <input name="imagen" id="imagen" type='file' class="form-control" tabindex="2" value="{{$inversionista->imagen}}"/>
   
  </div>
  <div class="mb-3">
    <label for="" class="form-label">Descripcion</label>
    <input id="descripcion" name="descripcion" type="text" class="form-control" tabindex="3" value="{{$inversionista->descripcion}}">
  </div>
  <div class="mb-3">
    <label for="" class="form-label">Correo</label>
    <input id="correo" name="correo" type="text" class="form-control" tabindex="3" value="{{$inversionista->correo}}">
  </div>
  <a href="/inversionista" class="btn btn-secondary" tabindex="5">Cancelar</a>
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