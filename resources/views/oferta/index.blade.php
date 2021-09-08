@extends('layouts.plantillabase')

@section('contenido')
<a href="oferta/create" class="btn btn-primary">CREAR</a>
<table class="w-full table-fixed table table-dark table-striped mt-4">
    <thead>
        <tr>
            <th scope="col">ID</th>
            <th scope="col">Nombre</th>
            <th scope="col">Imagen</th>
            <th scope="col">Cantidad</th>
            <th scope="col">Descuento(%)</th>
            <th scope="col">Precio</th>
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
            <td> 
                <a href="{{ route('oferta.edit', $oferta->id) }}" class="btn btn-warning">editar</i></a>
               <form action="{{ route('oferta.delete', $oferta->id) }}" method="POST" style="display: inline-block;" onsubmit="return confirm('Seguro?')">
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