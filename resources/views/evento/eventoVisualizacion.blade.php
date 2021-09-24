<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- CSRF Token -->
  <meta name="csrf-token" content="{{ csrf_token() }}">



  <!-- Scripts -->
  <script src="{{ asset('js/app.js') }}" defer></script>



  <!-- Fonts -->
  <link rel="dns-prefetch" href="//fonts.gstatic.com">
  <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
  <link href="{{ asset('css/evento.css') }}" rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
  <script src="https://polyfill.io/v3/polyfill.min.js?features=default"></script>
  <script>
   function initMap(){
        // The location of Uluru
        const uluru = {lat:2.44520631110326, lng:  -76.61465673274535};
        // The map, centered at Uluru
        const map = new google.maps.Map(document.getElementById("map"), {
          zoom: 15,
          center: uluru,
        });

        const Evento1={"coords":{"lat":2.4418613705096908,"lng":-76.60630072209013},
        "nombre":"Feria Agro al Parque",
        "dir1":"Parque Caldas",
        "dir2":"Popayan, Cauca"
      }
      const Evento2={"coords":{"lat":2.441009808707396,"lng":-76.60490229325409},
      "nombre":"Universidad del Cauca",
      "dir1":"Cl 5 #4-70",
      "dir2":"Popayan, Cauca"
    }
    const Evento3={"coords":{"lat":2.4423702076077256,"lng":-76.60961646864777},
    "nombre":"Festival de la Manzana",
    "dir1":"Casa museo Negret",
    "dir2":"Calle 5. No. 10-23 sector histórico"
  }
  const Evento4={"coords":{"lat":2.443180718863847,"lng":-76.6028029887374},
  "nombre":"Evento Anual AgroCauca",
  "dir1":"Cl. 2A #3-111 a 3-1 sector histórico",
  "dir2":"Popayan, Cauca"
}
const Evento5={"coords":{"lat":2.4410357893247148,"lng":-76.60856675145111},
"nombre":"Vigesima Reunion de Cocoteros del Cauca",
"dir1":"Cra. 9 #6-47",
"dir2":"Popayan, Cauca"
}
addMarker(Evento1)
addMarker(Evento2)
addMarker(Evento3)
addMarker(Evento4)
addMarker(Evento5)
        /*addMarker({
          coords:{lat:2.433, lng: -76.617 },
          content:'<h1>Evento 1</h1>'});
        addMarker({
          coords:{lat:2.440385807863125, lng:-76.6028274050303 },
          content:'<h1>Evento 2</h1>'});
        addMarker({
          coords:{lat:2.442446199992913, lng:-76.60930062269068},
          content:'<h1>Evento 3</h1>'});*/
        //Crear una funcion para añadir marcadores
        function addMarker(evento){
          var marker = new google.maps.Marker({
            position: evento.coords,
            map: map,
          });

          const infoWindow = new google.maps.InfoWindow({
            content:`<h3>${evento.nombre}</h3>
            <h4  >${evento.dir1}</h4>
            <h4>${evento.dir2}</h4>`
          });

          marker.addListener('click',function(){
            infoWindow.open(map,marker);
          });

          
        }
      }
    </script>
    <style type="text/css">
     #map {
      height: 100%;
    }

    html,
    body {
      height: 100%;
      margin:0;
      padding: 0;
    }
  </style>

</head>
<body>
  <nav class="navbar navbar-expand-lg  navbar-dark" id="navPrincipal" >
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="collapsibleNavbar">
      <ul class="navbar-nav">
        <img id="icono" src="/imagenes/AgroCauca.png">
        <h2 id="tituloIcono">Cauca AgroSostenible</h2>
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="/">Inicio</a>
        </li>
        <li class="nav-item">
          <a class="nav-link active"  href="canastaVisualizacion">Canasta</a>
        </li>
        <li class="nav-item">
          <a class="nav-link active" href="organizacionVisualizacion">Emprendimientos</a>
        </li>    
        <li class="nav-item">
          <a class="nav-link active" href="ofertaVisualizacion">Agro Oferta</a>
        </li>
        <li class="nav-item">
          <a class="nav-link active" href="inversionistaVisualizacion" >Inversionistas</a>
        </li>
        <li class="nav-item">
          <a class="nav-link active" href="eventoVisualizacion" >Eventos</a>
        </li>
        <li class="nav-item">
          <a class="nav-link active" href="carrito" >Carrito</a>       
        </li>      
      </ul>
      <ul class="navbar-nav ml-auto">
        <!-- Authentication Links -->
        @guest
        @if (Route::has('login') )
        <li class="nav-item">
          <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
        </li>

        @endif

        @if (Route::has('register'))
        <li class="nav-item">
          <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
        </li>
        @endif
        @else
        @if(Auth::user()->user =='admin')
        <a class="nav-link active" href="/admin" >Gestionar</a>   
        @endif


        <li class="nav-item dropdown">
          <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
            {{ Auth::user()->name }}
          </a>

          <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
            <a class="dropdown-item" href="{{ route('logout') }}"
            onclick="event.preventDefault();
            document.getElementById('logout-form').submit();">
            {{ __('Logout') }}
          </a>

          <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
            @csrf
          </form>
        </div>
      </li>


      @endguest
    </ul>
  </div>  
</nav>

<div id="map">
  <script async
  src="https://maps.googleapis.com/maps/api/js?key=AIzaSyD01ZoVUq6YPpGV3tjGJxX5D6LcbFvQo58&libraries=places&callback=initMap">
</script>
</div>
</body>
<footer>

  <div class="main-content">
    <div class="left box">
      <h2>Ubicacion</h2>
      <div class="content">
       <div class="place">
        <span class="fas fa-map-marker-alt"></span>
        <span class="text">cra 36 # 15-6</span>
      </div>
      <div class="place">
        <span class="fas fa-map-marker-alt"></span>
        <span class="text">Popayan, Colombia</span>
      </div>

    </div>
  </div>

  <div class="center box">
    <h2>Contactos</h2>
    <div class="content">

      <div class="phone">
        <span class="fas fa-phone-alt"></span>
        <span class="text">+57 311-387-2448</span>
      </div>
      <div class="email">
        <span class="fas fa-envelope"></span>
        <span class="text">jhonalexsa@unicaua.edu.co</span>
      </div>
      <div class="email">
        <span class="fas fa-envelope"></span>
        <span class="text">pintocristian@unicauca.edu.co</span>
      </div>
    </div>
  </div>

  <div class="right box">
    <h2>Siguenos</h2>
    <div class="content">

     <div id="divIconos">

       <a href=" https://www.facebook.com/16camilo" target="_blank">
         <img  src="/imagenes/facebook.png" id="iconos">
       </a>



     </div>
     <div id="divIconos">
      <a href="https://www.instagram.com/16camilocp"  target="_blank">
        <img src="/imagenes/instagram.png" id="iconos">
      </a>

    </div>
    <div id="divIconos">
      <a href="https://www.youtube.com/channel/UCK0aBPupMSeyUZcW3TAXWoQ"  target="_blank">
        <img src="/imagenes/youtube.png" id="iconos">
      </a>

    </div>





  </div>
</div>
</div>
<div class="bottom">
  <center>
    <span class="credit">Cauca AgroSostenible 
    | </span>
    <span class="far fa-copyright"></span><span> 2021.</span>
  </center>
</div>




</footer>
</html>
