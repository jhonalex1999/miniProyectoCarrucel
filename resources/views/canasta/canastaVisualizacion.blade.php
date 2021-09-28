@extends('layouts.app')

@section('content')

<div class="container" >
	<div class="row">
		<div class=" col ">
			<div>
				<a href="{{ route('canastaVisualizacionPrecioAsc') }}" class="btn btn-success">Menor a mayor precio</a>
				<a href="{{ route('canastaVisualizacionPrecioDesc') }}" class="btn btn-success">Mayor a Menor precio</a>
				<a href="{{ route('canastaVisualizacionNombreAsc') }}" class="btn btn-success">A-Z</a>
				<a href="{{ route('canastaVisualizacionNombreDesc') }}" class="btn btn-success">Z-A</a>
			</div>
			<br>
			<div class="card-columns">
				@foreach($canasta as $item)
				<div class="card" >
					<img src="{{asset('storage').'/'.$item->imagen}}" class="card-img-top" alt="...">
					<div class="card-body">
						<h5 class="card-title"> Nombre : {{$item->nombre}}</h5>
						<p class="card-text"> Precio: {{$item->precio}} $</p>
						<a href="{{ route('carrito.agregar', $item->id) }}" class="btn btn-carrito">
							<img id="carrito" src="/imagenes/carrito.png">
						Agregar al carrito</a>
					</div>
				</div>
				@endforeach
			</div>
		</div>
		
	</div>
</div>
@endsection