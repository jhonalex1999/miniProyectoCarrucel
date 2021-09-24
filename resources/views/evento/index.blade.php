@extends('layouts/plantillabase');

@section('contenido')
<h1>Mostrar Lista de Eventos</h1>
<form action="{{ route('evento.create') }}" method="GET">
	 <button type="submit" class="btn btn-primary" tabindex="4">Agregar Evento</button>
</form>
<div class="row">
    <div class="col">
        <div class="table-responsive">
				
				<table class=" table   table-dark table-striped mt-4" >
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
                <a href="{{ route('evento.edit', $evento->id) }}" class="btn btn-editar">
                  <img id="editar" src="/imagenes/editar.png">
              	</i></a>
               <form action="{{ route('evento.delete', $evento->id) }}" method="POST" style="display: inline-block;" onsubmit="return confirm('Seguro?')">
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