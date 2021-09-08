@extends('layouts.plantillabase')

@section('contenido')
<h2>CREAR OFERTA</h2>

<form action="/oferta" method="POST" enctype="multipart/form-data">
    @csrf
  <div class="mb-3">
    <label for="" class="form-label">Nombre</label>
    <input id="nombre" name="nombre" type="text" class="form-control" tabindex="1">    
  </div>

  <!-- Para ver la imagen seleccionada, de lo contrario no se -->
  <div class="grid grid-cols-1 mt-5 mx-7">
    <img id="imagenSeleccionada" style="max-height: 300px;">           
  </div>
  
  <div class="grid grid-cols-1 mt-5 mx-7">
    <label class="uppercase md:text-sm text-xs text-gray-500 text-light font-semibold mb-1">Subir Imagen</label>
    <div class='flex items-center justify-center w-full'>
      
        <input name="imagen" id="imagen" type='file' class="hidden" />
    </div>
  </div>


  <div class="mb-3">
    <label for="" class="form-label">Cantidad</label>
    <input id="cantidad" name="cantidad" type="number" class="form-control" tabindex="3">
  </div>
  <div class="mb-3">
    <label for="" class="form-label">Descuento</label>
    <input id="descuento" name="descuento" type="number" step="any" class="form-control" tabindex="3">
  </div>
  <div class="mb-3">
    <label for="" class="form-label">Precio</label>
    <input id="precio" name="precio" type="number" step="any" value="0.00" class="form-control" tabindex="3">
  </div>
  <a href="/oferta" class="btn btn-secondary" tabindex="5">Cancelar</a>
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