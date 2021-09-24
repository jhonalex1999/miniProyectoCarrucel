@extends('layouts/plantillabase');

@section('contenido')
<h1>Mostrar Lista de Organizaciones</h1>
<form action="{{ route('organizacion.create') }}" method="GET">
	 <button type="submit" class="btn btn-primary" tabindex="4">Agregar Organizacion</button>
</form>
<div class="row">
	<div class="col">
	<div class="table-responsive">
	<table class="table  table-dark table-striped mt-4" >
	<thead>
		<tr>
			<th scope="col">ID</th>
			<th scope="col">Nombre</th>
			<th scope="col">Imagen</th>
			<th scope="col">Ubicación</th>
			<th scope="col">Telefono</th>
			<th scope="col">Acciones</th>
		</tr>
	</thead>
	<thbody>
		@foreach($organizaciones as $organizacion)
		<tr>
			<td>{{$organizacion->id}}</td>
			<td>{{$organizacion->nombre}}</td>
			<td >
                <img src="{{asset('storage').'/'.$organizacion->imagen}}" alt="" width="100" height="100">
            </td>
			<td>{{$organizacion->ubicacion}}</td>
			<td>{{$organizacion->telefono}}</td>
			<td> 
                <a href="{{ route('organizacion.edit', $organizacion->id) }}" class="btn btn-editar">
                	  <img id="editar" src="/imagenes/editar.png">
                </i></a>
               <form action="{{ route('organizacion.delete', $organizacion->id) }}" method="POST" style="display: inline-block;" onsubmit="return confirm('Seguro?')">
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

 <a href="/admin" class="btn btn-secondary" tabindex="5">Atras</a>
@endsection