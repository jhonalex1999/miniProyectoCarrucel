@extends('layouts.app')

@section('content')

<div class="container">
	<div class="row">
		<div class="col">
			<div class="card-columns">
				@foreach($canasta as $item)
					<div class="card" style="width: 18rem;">
						  <img style="width:285px; height:250px " src="{{asset('storage').'/'.$item->imagen}}" class="card-img-top" alt="...">
						  <div class="card-body">
						    <h5 class="card-title">{{$item->nombre}}</h5>
						    <p class="card-text">{{$item->precio}}</p>
						    <a href="#" class="btn btn-primary">Agregar al carrito</a>
						  </div>
					</div>
				@endforeach
			</div>
		</div>
		
	</div>
</div>
@endsection