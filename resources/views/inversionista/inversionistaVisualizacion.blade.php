@extends('layouts.app')

@section('content')
<h1>Mostrar Lista de Inversionistas</h1>
<div class="containerInv">
	@foreach($inversionista as $item)
	<div class="containerInv_tarjeta">
	<a href="#">
			<figure class="figuraInv">
				<img  class="frontal"  src="{{asset('storage').'/'.$item->imagen}}" alt="">
				<figcaption class="trasera">
					<h2 class="titulo">Titulo de prueba para la cara trasera de la imagen</h2>
					<hr>
					<p>Parrafo para probar la cara trasera 	del contenedor</p>	
				</figcaption>
			</figure>
		</a>
	</div>
	@endforeach
</div>
@endsection