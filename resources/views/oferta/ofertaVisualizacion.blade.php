	@extends('layouts.app')

	@section('content')
	<div class="container">
		<div>
					<a href="{{ route('ofertaVisualizacionPrecioAsc') }}" class="btn btn-success">Menor a mayor precio</a>
					<a href="{{ route('ofertaVisualizacionPrecioDesc') }}" class="btn btn-success">Mayor a menor precio</a>				
					<a href="{{ route('ofertaVisualizacionNombreAsc') }}" class="btn btn-success">A-Z</a>
					<a href="{{ route('ofertaVisualizacionNombreDesc') }}" class="btn btn-success">Z-A</a>
				</div>
				<br>
	</div>
	<div class="container" >
		<div class="row">
		
				

					@foreach($oferta as $item)
						<div class="card" >
							  <img  src="{{asset('storage').'/'.$item->imagen}}" class="card-img-top" alt="...">
							  <div class="card-body">
							    <h5 class="card-title">Nombre: {{$item->nombre}} </h5>
							    <p class="card-text">Precio Normal: {{$item->precio}} $</p>
							    <p class="card-text"><img id="descuento" src="/imagenes/descuento.png">  Oferta: {{$item->precioN}} $</p>
							   
							    <a href="{{ route('carrito.agregarOferta', $item) }}" class="btn btn-info">
	 							<img id="carrito" src="/imagenes/carrito.png">
							    Agregar al carrito</a>
							  </div>
						</div>
					@endforeach
				


			
		</div>
	</div>


					
	@endsection