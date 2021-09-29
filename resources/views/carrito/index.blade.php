@extends('layouts.plantillabase')

@section('contenido')
<div class="row">
    <div class="col">
        <div class="table-responsive">
                <table class=" table   table-dark table-striped mt-4" >
    <p>
        <a id="btnVaciar" href="{{ route('carrito.vaciar')}}" class="btn btn-danger"><img id="vaciar" src="/imagenes/carro-vacio.png"> Vaciar carrito</a>
    </p>
    <thead>
        <tr>
            <th scope="col">ID</th>
            <th scope="col">Nombre</th>
            <th scope="col">Imagen</th>
            <th scope="col">Cantidad</th>
            <th scope="col">Precio Unitario</th>
            <th scope="col">Precio Total</th>
            <th scope="col">Acciones</th>
        </tr>
    </thead>
    <thbody>
        @foreach($carrito as $item)
        <tr>
            <td>{{$item->id}}</td>
            <td>{{$item->nombre}}</td>
            <td >
            <img src="{{asset('storage').'/'.$item->imagen}}" alt="" width="100" height="100">
            </td>

            <td>    


            <form action="{{ route('carrito.updateCant', $item->id) }}" method="POST">
            @csrf
            @method('PUT')    

                <input type="number" class="cantidadUpd" min="1" max="{{$item->cantidad}}" value="1" name="cantidad">
                <button type="submit" class="btn btn-update" tabindex="4"><img id="actualizar" src="/imagenes/actualizar.png"></button>
             </form>


            </td>
            
            <td>{{$item->precio}}</td>
            <td>{{$item->precioT}}</td>
            <td> 
               <form action="{{ route('carrito.delete', $item->id) }}" method="POST" style="display: inline-block;" onsubmit="return confirm('Seguro?')">
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

<h2>Total a pagar :  {{$total}}</h2>

 <a href="/"  class="btn btn-warning" tabindex="5"><img id="moneda" src="/imagenes/moneda.png"> Seguir Comprando</a>

 
 
@endsection