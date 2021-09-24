@extends('layouts.plantillabase')

@section('contenido')
<form action="{{ route('inversionista.create') }}" method="GET">
	 <button type="submit" class="btn btn-primary" tabindex="4">Agregar Inversionista</button>
</form>
<div class="row">
    <div class="col">
        <div class="table-responsive">
				<table class=" table   table-dark table-striped mt-4" >
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
			<a href="{{ route('inversionista.edit', $inversionista->id) }}" class="btn btn-editar">
				  <img id="editar" src="/imagenes/editar.png">
			</i></a>
			<form action="{{ route('inversionista.delete', $inversionista->id) }}" method="POST" style="display: inline-block;" onsubmit="return confirm('Seguro?')">
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
