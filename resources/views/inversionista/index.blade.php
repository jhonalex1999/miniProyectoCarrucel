@extends('layouts.plantillabase')

@section('contenido')

<a href="inversionista/create" class="btn btn-primary">CREAR</a>
<table class="w-full table-fixed table table-dark table-striped mt-4">
	<thead>
		<tr>
			<th scope="col">ID</th>
			<th scope="col">Nombre</th>
			<th scope="col">Imagen</th>
			<th scope="col">Descripcion</th>
			<th scope="col">Correo</th>
			<th scope="col">Acciones</th>
		</tr>
	</thead>
	<thbody>
		@foreach($inversionistas as $inversionista)
		<tr>
			<td>{{$inversionista->id}}</td>
			<td>{{$inversionista->nombre}}</td>
			<td >
                <img src="{{asset('storage').'/'.$inversionista->imagen}}" alt="" width="100" height="100">
            </td>
			<td>{{$inversionista->descripcion}}</td>
			<td>{{$inversionista->correo}}</td>

			<td>
			<a href="{{ route('inversionista.edit', $inversionista->id) }}" class="btn btn-warning">Editar</i></a>
			<form action="{{ route('inversionista.delete', $inversionista->id) }}" method="POST" style="display: inline-block;" onsubmit="return confirm('Seguro?')">
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
