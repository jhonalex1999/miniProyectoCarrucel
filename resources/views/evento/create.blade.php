@extends('layouts.plantillabase')

@section('contenido')
<h2>CREAR EVENTO</h2>

<form action="/evento" method="POST" enctype="multipart/form-data">
    @csrf
  <div class="mb-3">
    <label for="" class="form-label">Nombre</label>
    <input id="nombre" name="nombre" type="text" class="form-control" tabindex="1">    
  </div>

  <div class="mb-3">
    <label for="" class="form-label">Ubicacion</label>
    <input id="ubicacion" name="ubicacion" type="text" class="form-control" tabindex="2">
  </div>
  
  <a href="/evento" class="btn btn-secondary" tabindex="5">Cancelar</a>
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