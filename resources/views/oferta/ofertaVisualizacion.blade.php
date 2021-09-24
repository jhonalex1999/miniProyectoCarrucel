@extends('layouts.app')

@section('content')

<div class="container" >
	<div class="row">
		<div class="col">
			<div class="card-columns">
				@foreach($oferta as $item)
					<div class="card" >
						  <img  src="{{asset('storage').'/'.$item->imagen}}" class="card-img-top" alt="...">
						  <div class="card-body">
						    <h5 class="card-title">Nombre: {{$item->nombre}} </h5>
						    <p class="card-text">Precio Normal: {{$item->precio}} $</p>
						    <p class="card-text">Oferta: {{$item->precio-($item->precio * ($item->descuento/100))}} $</p>
						   
						    <a href="{{ route('carrito.agregarOferta', $item) }}" class="btn btn-carrito">
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