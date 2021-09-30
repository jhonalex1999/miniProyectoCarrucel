@extends('layouts.editar-eliminar')

@section('contenido')
<br><br><br>
<center>
    
    <div class="card" id="card">
        <h2>CREAR ORGANIZACION</h2>

<br><br>
<form action="/organizacion" method="POST" enctype="multipart/form-data">
    @csrf
  <div class="mb-3">
    
    <input placeholder="Nombre"  id="nombre" name="nombre" type="text" class="input form-control" tabindex="1">    
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
      
        <input name="imagen" id="imagen" type='file' class="hidden" />
    </div>
  </div>
@error('imagen')
    <small>*{{$message}}</small>
    <br>
  @enderror
<br>
  <div class="mb-3">
    
    <input placeholder="Ubicacion"  id="ubicacion" name="ubicacion" type="text" class="input form-control" tabindex="3">
  </div>
  @error('ubicacion')
    <small>*{{$message}}</small>
    <br>
  @enderror
<br>
  <div class="mb-3">
    
    <input placeholder="Telefono"  id="telefono" name="telefono" type="number"  step="any" class=" input form-control" tabindex="3">
  </div>
  @error('telefono')
    <small>*{{$message}}</small>
    <br>
  @enderror
<br>
 
  <button type="submit" class="btn btn-primary" tabindex="4">Guardar</button>
  <br><br>
   <a href="/organizacion" class="btn btn-danger" tabindex="5">Cancelar</a>
</form>


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