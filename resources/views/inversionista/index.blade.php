@extends('layouts.plantillabase')

@section('contenido')
<form action="{{ route('inversionista.create') }}" method="GET">
	 <button type="submit" class="btn btn-primary" tabindex="4">Agregar Inversionista</button>
</form>
<table class=" table table-responsive  table-dark table-striped mt-4" >
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
 <a href="/admin" class="btn btn-secondary" tabindex="5">Atras</a>
@endsection
