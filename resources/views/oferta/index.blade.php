@extends('layouts.plantillabase')

@section('contenido')
<form action="{{ route('oferta.create') }}" method="GET">
     <div class="col-sm-12">
         <a href="/admin" id="btnAtras" class="btn btn-secondary" tabindex="5"><img id="atras" src="/imagenes/atras.png"></a>
        <center>
             <button type="submit" class="btn btn-success" tabindex="4">Agregar Oferta</button>
        </center>
     </div>
    
</form>
<div class="row">
    <div class="col">
        <div class="table-responsive">
                
<table class=" table   table-dark table-striped mt-4" >
    <thead>
        <tr>
            <th scope="col">ID</th>
            <th scope="col">Nombre</th>
            <th scope="col">Imagen</th>
            <th scope="col">Cantidad</th>
            <th scope="col">Descuento(%)</th>
            <th scope="col">Precio</th>
            <th scope="col">Precio Nuevo</th>
            <th scope="col">Acciones</th>
        </tr>
    </thead>
    <thbody>
        @foreach($oferta as $oferta)
        <tr>
            <td>{{$oferta->id}}</td>
            <td>{{$oferta->nombre}}</td>
            <td >
                <img src="{{asset('storage').'/'.$oferta->imagen}}" alt="" width="100" height="100">
            </td>
            <td>{{$oferta->cantidad}}</td>
            <td>{{$oferta->descuento}}</td>
            <td>{{$oferta->precio}}</td>
            <td>{{$oferta->precioN}}</td>
            <td> 
                <a href="{{ route('oferta.edit', $oferta->id) }}" class="btn btn-editar">
                      <img id="editar" src="/imagenes/editar.png">
                </i></a>
               <form action="{{ route('oferta.delete', $oferta->id) }}" method="POST" style="display: inline-block;" onsubmit="return confirm('Seguro?')">
                    @csrf
                    @method('DELETE')
                        <button class="btn btn-eliminar" type="submit" rel="tooltip">
                            
                            <img id="eliminar" src="/imagenes/eliminar.png">
                        </button>
                 </form> 
            </td>
        </tr>
        @endforeach
    </thbody>
</table>            
        </div>
    </div>
</div>


@endsection