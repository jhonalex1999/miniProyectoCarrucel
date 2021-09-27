@extends('layouts.app')

@section('content')

<div class="containerInv" >
	@foreach($inversionista as $item)
	<div class="containerInv_tarjeta">
	<a href="#">
			<figure class="figuraInv">
				<img  class="frontal"  src="{{asset('storage').'/'.$item->imagen}}" alt="">
				<figcaption class="trasera">
					<h2 class="titulo">{{$item->nombre}}</h2>
					<hr>
					<p>{{$item->descripcion}}
						<br>
						Contacto
						<br>
						{{$item->correo}}
						<br>
						

					</p>	
				</figcaption>
			</figure>
		</a>
	</div>
	@endforeach
</div>
@endsection