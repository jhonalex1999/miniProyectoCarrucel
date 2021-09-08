@extends('layouts.plantillabase')

@section('contenido')
<a href="canasta/create" class="btn btn-primary">CREAR</a>
<table class="w-full table-fixed table table-dark table-striped mt-4">
    <thead>
        <tr>
            <th scope="col">ID</th>
            <th scope="col">Nombre</th>
            <th scope="col">Imagen</th>
            <th scope="col">Cantidad</th>
            <th scope="col">Precio</th>
            <th scope="col">Acciones</th>
        </tr>
    </thead>
    <thbody>
        @foreach($canasta as $canasta)
        <tr>
            <td>{{$canasta->id}}</td>
            <td>{{$canasta->nombre}}</td>
            <td >
                <img src="{{asset('storage').'/'.$canasta->imagen}}" alt="" width="100" height="100">
            </td>
            <td>{{$canasta->cantidad}}</td>
            <td>{{$canasta->precio}}</td>
            <td> 
                <a href="{{ route('canasta.edit', $canasta->id) }}" class="btn btn-warning">editar</i></a>
               <form action="{{ route('canasta.delete', $canasta->id) }}" method="POST" style="display: inline-block;" onsubmit="return confirm('Seguro?')">
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