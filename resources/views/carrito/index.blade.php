@extends('layouts.plantillabase')

@section('contenido')
<table class="w-full table-fixed table table-dark table-striped mt-4">
    <p>
        <a href="{{ route('carrito.vaciar')}}" class="btn btn-danger">Vaciar Carrito</a>
    </p>
    <thead>
        <tr>
            <th scope="col">ID</th>
            <th scope="col">Nombre</th>
            <th scope="col">Imagen</th>
            <th scope="col">Cantidad</th>
            <th scope="col">precio</th>
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

            <form action="{{ route('carrito.updateCant', $item) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')    

                <input type="number" class="cantidadUpd" min="1" max="100" value="{{$item->cantidad}}" name="cantidadUpd">
                <button type="submit" class="btn btn-primary" tabindex="4">Actualizar</button>
             </form>

            </td>
            
            <td>{{$item->precio}}</td>
            <td> 
               <form action="{{ route('carrito.delete', $item->id) }}" method="POST" style="display: inline-block;" onsubmit="return confirm('Seguro?')">
                    @csrf
                    @method('DELETE')
                        <button class="btn btn-danger" type="submit" rel="tooltip">Eliminar</button>
                 </form> 
            </td>
        </tr>
        @endforeach
    </thbody>
</table>
@endsection