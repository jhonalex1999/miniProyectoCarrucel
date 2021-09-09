@extends('layouts.plantillabase')

@section('contenido')
<table class="w-full table-fixed table table-dark table-striped mt-4">
    <thead>
        <tr>
            <th scope="col">ID</th>
            <th scope="col">Nombre</th>
            <th scope="col">Imagen</th>
            <th scope="col">Cantidad</th>
             <th scope="col">precio</th>
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
            <td>{{$item->cantidad}}</td>
            <td>{{$item->precio}}</td>
           
        </tr>
        @endforeach
    </thbody>
</table>
@endsection