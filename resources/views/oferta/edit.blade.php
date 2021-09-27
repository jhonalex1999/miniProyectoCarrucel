@extends('layouts.editar-eliminar')

@section('contenido')
<br><br><br>
<center>
     <div class="card" id="card">
         <h2>EDITAR OFERTA</h2>
<br><br>
<form action="{{route('oferta.update',$oferta->id)}}" method="POST" enctype="multipart/form-data">
   
    @csrf
    @method('PUT')
  <div class="mb-3">
    <label for="" class="form-label">Nombre</label>
    <input id="nombre" name="nombre" type="text" class="input form-control" tabindex="1" value="{{$oferta->nombre}}">    
  </div>
  <div class="mb-3">
    <img id="imagenEdit" src="{{asset('storage').'/'.$oferta->imagen}}" alt="">
 
    <div class='flex items-center justify-center w-full'>
      
        <input name="imagen" id="imagen" type='file' class="input form-control" tabindex="2" value="{{$oferta->imagen}}"/>
   
  </div>
  <div class="mb-3">
    <label for="" class="form-label">Cantidad</label>
    <input id="cantidad" name="cantidad" type="number" class="input form-control" tabindex="3" value="{{$oferta->cantidad}}">
  </div>
  <div class="mb-3">
    <label for="" class="form-label">Descuento</label>
    <input id="descuento" name="descuento" type="number"  class="input form-control" tabindex="3" value="{{$oferta->descuento}}">
  </div>
  <div class="mb-3">
    <label for="" class="form-label">Precio</label>
    <input id="precio" name="precio" type="number"  class="input form-control" tabindex="3" value="{{$oferta->precio}}">
  </div>
 
  <button type="submit" class="btn btn-primary" tabindex="4">Guardar</button>
 <br><br>
 <a href="/oferta" class="btn btn-danger" tabindex="5">Cancelar</a>

</form>
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