@extends('layouts.plantillaBase2')

@section('content')

<div id="carouselExampleCaptions" class="carousel slide" data-bs-ride="carousel">
  <div class="carousel-indicators">
    <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
    <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="1" aria-label="Slide 2"></button>
    <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="2" aria-label="Slide 3"></button>
  </div>
  <div  class="carousel-inner">


    @forelse($organizacion as $item)
      <div class="carousel-item @if($loop->index==0)  active @endif" id="slider">
         <img id="imgSlider" src="{{asset('storage').'/'.$item->imagen}}" class="d-block w-100" alt="...">
         
              <h2>{{$item->nombre}}</h2>
              <p>
                <h4>{{$item->ubicacion}}</h2>
                <br>
                <h4>{{$item->telefono}}</h2>
              </p>
          
     </div>
    @empty
    @endforelse
    
  <button  class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    
  </button>
  <button  class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    
  </button>
</div>


<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

  
@endsection
