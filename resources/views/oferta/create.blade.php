@extends('layouts.editar-eliminar')

@section('contenido')
<br><br><br>
<center>
    <div class="card" id="card">
        <h2>CREAR OFERTA</h2>
<br><br>
<form action="/oferta" method="POST" enctype="multipart/form-data">
    @csrf
  <div class="mb-3">
    
    <input placeholder="Nombre" id="nombre" name="nombre" type="text" class="input form-control" tabindex="1">    
  </div>
@error('nombre')
    <small>*{{$message}}</small>
    <br>
  @enderror
<br>
  <!-- Para ver la imagen seleccionada, de lo contrario no se -->
  <div class="grid grid-cols-1 mt-5 mx-7">
    <img id="imagenSeleccionada" style="max-height: 300px;">           
  </div>
  
  <div class="grid grid-cols-1 mt-5 mx-7">
    <label class="uppercase md:text-sm text-xs text-gray-500 text-light font-semibold mb-1"></label>
    <div class='flex items-center justify-center w-full'>
      
        <input name="imagen" id="imagen" type='file' class="input hidden" />
    </div>
  </div>

@error('imagen')
    <small>*{{$message}}</small>
    <br>
  @enderror
<br>
  <div class="mb-3">
    
    <input placeholder="Cantidad" id="cantidad" name="cantidad" type="number" class="input form-control" tabindex="3">
  </div>
  @error('cantidad')
    <small>*{{$message}}</small>
    <br>
  @enderror
<br>
  <div class="mb-3">
    
    <input placeholder="Descuento" id="descuento" name="descuento" type="number" step="any" class="input form-control" tabindex="3">
  </div>
@error('descuento')
    <small>*{{$message}}</small>
    <br>
  @enderror
<br>

  <div class="mb-3">
    
    <input placeholder="Precio" id="precio" name="precio" type="number" step="any"  class="input form-control" tabindex="3">
  </div>
 @error('precio')
    <small>*{{$message}}</small>
    <br>
  @enderror
<br>
  <button type="submit" class="btn btn-primary" tabindex="4">Guardar</button>
</form>
 <a href="/oferta" class="btn btn-danger" tabindex="5">Cancelar</a>
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