@extends('layouts.app')

@section('content')

<div class="container">
	<div class="row">
		<div class="col">
			<div class="card-columns">
				@foreach($oferta as $item)
					<div class="card" style="width: 100%;">
						  <img  src="{{asset('storage').'/'.$item->imagen}}" class="card-img-top" alt="...">
						  <div class="card-body">
						    <h5 class="card-title">{{$item->nombre}}</h5>
						    <p class="card-text">{{$item->precio}}</p>
						   
                            
						    <a href="{{ route('carrito.agregarOferta', $item) }}" class="btn btn-primary">Agregar al carrito</a>
						  </div>
					</div>
				@endforeach
			</div>
		</div>
		
	</div>
</div>


				
@endsection