@extends('layouts.editar-eliminar')

@section('contenido')
<br><br><br>
<center>
    
    <div class="card" id="card">
            <h2>EDITAR CANASTA</h2>
<br><br>
<form action="{{route('canasta.update',$canasta->id)}}" method="POST" enctype="multipart/form-data">
   
    @csrf
    @method('PUT')
  <div class="mb-3">
    <label for="" class="form-label">Nombre</label>
    <input id="nombre" name="nombre" type="text" class="input form-control" tabindex="1" value="{{$canasta->nombre}}">    
  </div>
  @error('nombre')
    <small>*{{$message}}</small>
    <br>
  @enderror
<br>
  <div class="mb-3">
    <img id="imagenEdit" src="{{asset('storage').'/'.$canasta->imagen}}" alt="">
    <label for="" class="form-label"></label> 
    <div class='flex items-center justify-center w-full'>
      
        <input  name="imagen" id="imagen" type='file' class="input form-control" tabindex="2" value="{{$canasta->imagen}}"/>
   
  </div>
   @error('imagen')
    <small>*{{$message}}</small>
    <br>
  @enderror
  <div class="mb-3">
    <label for="" class="form-label">Cantidad</label>
    <input id="cantidad" name="cantidad" type="number" class="input form-control" tabindex="3" value="{{$canasta->cantidad}}">
  </div>
   @error('cantidad')
    <small>*{{$message}}</small>
    <br>
  @enderror
  <div class="mb-3">
    <label for="" class="form-label">Precio</label>
    <input id="precio" name="precio" type="number"  class="input form-control" tabindex="3" value="{{$canasta->precio}}">
  </div>
  @error('precio')
    <small>*{{$message}}</small>
    <br>
  @enderror
  <button type="submit" class="btn btn-primary" tabindex="4">Guardar</button>
  <br><br>
   <a href="/canasta" class="btn btn-danger" tabindex="5">Cancelar</a>
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