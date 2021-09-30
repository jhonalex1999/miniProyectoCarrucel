@extends('layouts.editar-eliminar')

@section('contenido')

<br><br><br>
<center>
    <div class="card" id="card">
            <h2>EDITAR INVERSIONISTA</h2>
<br><br>
<form action="{{route('inversionista.update',$inversionista->id)}}" method="POST" enctype="multipart/form-data">
   
    @csrf
    @method('PUT')
  <div class="mb-3">
    <label for="" class="form-label">Nombre</label>
    <input id="nombre" name="nombre" type="text" class="input form-control" tabindex="1" value="{{$inversionista->nombre}}">    
  </div>
  @error('nombre')
    <small>*{{$message}}</small>
    <br>
  @enderror
<br>
  <div class="mb-3">
    <img id="imagenEdit" src="{{asset('storage').'/'.$inversionista->imagen}}" alt="">

    <div class='flex items-center justify-center w-full'>
      
        <input name="imagen" id="imagen" type='file' class="input form-control" tabindex="2" value="{{$inversionista->imagen}}"/>
   
  </div>
  <div class="mb-3">
    <label for="" class="form-label">Descripcion</label>
    <input id="descripcion" name="descripcion" type="text" class="input form-control" tabindex="3" value="{{$inversionista->descripcion}}">
  </div>
   @error('descripcion')
    <small>*{{$message}}</small>
    <br>
  @enderror
<br>
  <div class="mb-3">
    <label for="" class="form-label">Correo</label>
    <input id="correo" name="correo" type="text" class="input form-control" tabindex="3" value="{{$inversionista->correo}}">
  </div>
 @error('correo')
    <small>*{{$message}}</small>
    <br>
  @enderror
<br>
  <button type="submit" class="btn btn-primary" tabindex="4">Guardar</button>
  <br><br>
</form>
  <a href="/inversionista" class="btn btn-danger" tabindex="5">Cancelar</a>
  <br>        
    </div>
</center>

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