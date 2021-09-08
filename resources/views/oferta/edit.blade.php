@extends('layouts.plantillabase')

@section('contenido')
<h2>EDITAR OFERTA</h2>

<form action="{{route('oferta.update',$oferta->id)}}" method="POST" enctype="multipart/form-data">
   
    @csrf
    @method('PUT')
  <div class="mb-3">
    <label for="" class="form-label">Nombre</label>
    <input id="nombre" name="nombre" type="text" class="form-control" tabindex="1" value="{{$oferta->nombre}}">    
  </div>
  <div class="mb-3">
    <img src="{{asset('storage').'/'.$oferta->imagen}}" alt="">
    <label for="" class="form-label">Imagen</label> 
    <div class='flex items-center justify-center w-full'>
      
        <input name="imagen" id="imagen" type='file' class="form-control" tabindex="2" value="{{$oferta->imagen}}"/>
   
  </div>
  <div class="mb-3">
    <label for="" class="form-label">Cantidad</label>
    <input id="cantidad" name="cantidad" type="number" class="form-control" tabindex="3" value="{{$oferta->cantidad}}">
  </div>
  <div class="mb-3">
    <label for="" class="form-label">Descuentp</label>
    <input id="descuento" name="descuento" type="number" step="any" class="form-control" tabindex="3" value="{{$oferta->descuento}}">
  </div>
  <div class="mb-3">
    <label for="" class="form-label">Precio</label>
    <input id="precio" name="precio" type="number" step="any" value="0.00" class="form-control" tabindex="3" value="{{$oferta->precio}}">
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