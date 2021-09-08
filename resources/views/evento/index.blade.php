@extends('layouts/plantillabase');

@section('contenido')
<h1>Mostrar Lista de Eventos</h1>
<a href="evento/create" class= "btn btn-primary">Agregar Evento</a>
<table class="table table-dark table-striped mt-4">
	<thead>
		<tr>
			<th scope="col">ID</th>
			<th scope="col">Nombre</th>
			<th scope="col">Ubicación</th>
			<th scope="col">Acciones</th>
		</tr>
	</thead>
	<thbody>
		@foreach($evento as $evento)
		<tr>
			<td>{{$evento->id}}</td>
			<td>{{$evento->nombre}}</td>
			<td>{{$evento->ubicacion}}</td>
			<td> 
                <a href="{{ route('evento.edit', $evento->id) }}" class="btn btn-warning">editar</i></a>
               <form action="{{ route('evento.delete', $evento->id) }}" method="POST" style="display: inline-block;" onsubmit="return confirm('Seguro?')">
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