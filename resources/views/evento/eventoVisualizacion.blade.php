<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Eventos</title>
	<meta name="viewport" content="initial-scale=1,maximum-scale=1,user-scalable=no">

	<!-- Scripts -->
	<script src="{{ asset('js/app.js') }}" defer></script>



	<!-- Fonts -->
	<link rel="dns-prefetch" href="//fonts.gstatic.com">
	<link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
	<link href="{{ asset('css/evento.css') }}" rel="stylesheet">
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

	<link href="https://api.mapbox.com/mapbox-gl-js/v2.4.1/mapbox-gl.css" rel="stylesheet">
	<script src="https://api.mapbox.com/mapbox-gl-js/v2.4.1/mapbox-gl.js"></script>
	<style>
		body { margin: 0; padding: 0; }
		
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

    <style>
        .marker {
            display: block;
            border: none;
            border-radius: 50%;
            cursor: pointer;
            padding: 0;
        }
    </style>
    <style>
      #map {
         position: absolute;
         width: 50%;
         height: 1200px;
     }
     #features {
         width: 50%;
         margin-left: 50%;
         font-family: sans-serif;
         overflow-y: scroll;
         background-color: #fafafa;
     }
     section {
         padding: 25px 50px;
         line-height: 25px;
         border-bottom: 1px solid #ddd;
         opacity: 0.25;
         font-size: 13px;
     }
     section.active {
         opacity: 1;
     }
     section:last-child {
         border-bottom: none;
         margin-bottom: 200px;
     }
 </style>

     <div id="map"></div>
    


 <div id="features">
  
<section id="claustro" class="active">
   <h3>Reunion Anual de Caficultores</h3>
   <h5>Claustro de Santo Domingo</h5>
   <p>
    Evento que reune a expertos en el cultivo del Cafe.
    Encontrara charlas de caficultores con años 
    de experiencia en el sector, sobre cultivo, comercializacion
    y distribucion del Cafe. Ademas de charlas tambien habra cata
    de cafes y muchos caficultores ofreceran sus productos 
    a excelentes precios.  
  </p>
  <br>
</section>
<section id="parque">
  <h3>Feria AgroAlParque</h3>
  <h5>Parque Caldas</h5>
 <p>
  Feria que resalta la agricultura del departamento del Cauca.
  Encuentra todo tipo de productos al mejor precio, sembrados y 
  cultivados en este departamento, apoyando asi al comercio y
  agricultura local.
</p>
</section>
<section id="morro">
 <h3>Festival del Coco</h3>
 <h5>Pueblito Patojo</h5>
 <p>
  Primera festival del Coco. Este evento reune a los productores de
  coco de todo el pacifico caucano, Timbiquí, Guapi, 
  Lopez de Micay, entre otros. 
  Ven y apoya a los productores de coco a través de esta iniciativa.
</p>
</section>
<section id="puente">
 <h3>Encuentro de Agricultores del Pacifico Caucano</h3>
 <h5>Puente del Humilladero</h5>
 <p>
  Evento dedicado a agricultores del Pacifico Caucano, realizado en la capital 
  del departamento para ofrecer sus productos a toda la poblacion
  con mejores precios y apoyando directamente a los agricultores que proveen
  dichos productos.
</p>
</section>
<section id="unicauca">
 <h3>Encuentro de productores de Frutas</h3>
 <h5>Universidad del Cauca Facultad FIET</h5>
 <p>
  La Universidad del Cauca abre sus puertas y ofrece el espacio
  para agricultores y principales productores de frutas del departamento del Cauca.
  El evento contara con asistencia de productores de frutas como el platano, la papaya,
  la mora, la piña, entre otros.

</p>
<br>
<br>
</section>
</div>
<script>
  mapboxgl.accessToken = 'pk.eyJ1IjoicGludG9jcmlzdGlhbiIsImEiOiJja3Rhbjl6cmExbnIzMm9vMG8zcnFiZ2EwIn0.F77TV_l9IWHqyxZ7J0kqlg';
  const map = new mapboxgl.Map({
     container: 'map',
     style: 'mapbox://styles/mapbox/streets-v11',
     center: [-76.606339, 2.441906],
     zoom: 15.5,
     bearing: 27,
     pitch: 45
 });

        // create the popup
        const popup1 = new mapboxgl.Popup({ offset: 50 }).setText(
            'Reunion Anual de Caficultores'
            );
        const popup2 = new mapboxgl.Popup({ offset: 50 }).setText(
            'Feria AgroAlParque'
            );
        const popup3 = new mapboxgl.Popup({ offset: 50 }).setText(
            'Festival del Coco'
            );
        const popup4 = new mapboxgl.Popup({ offset: 50 }).setText(
            'Encuentro de Agricultores del Pacifico Caucano'
            );
        const popup5 = new mapboxgl.Popup({ offset: 50 }).setText(
            'Encuentro de productores de Frutas'
            );
        
        // create a DOM for the marker
        /*const el1 = document.createElement('div');
        el1.id = 'marker';
        el1.className = 'marker';
        el1.style.backgroundImage = `url(/imagenes/imagen2.jpg)`;
        el1.style.width = `80px`;
        el1.style.height = `80px`;
        el1.style.backgroundSize = '100%';
         // create a DOM for the marker
        const el2 = document.createElement('div');
        el2.id = 'marker';
        el2.className = 'marker';
        el2.style.backgroundImage = `url(https://placekitten.com/g/80/80/)`;
        el2.style.width = `80px`;
        el2.style.height = `80px`;
        el2.style.backgroundSize = '100%';
        */
        // create a marker
		//new mapboxgl.Marker(el1)
        const marker1 = new mapboxgl.Marker()
        .setPopup(popup1)
        .setLngLat([-76.60439996583395, 2.441947710791877])
        .addTo(map);
        
        const marker2 = new mapboxgl.Marker()
        .setPopup(popup2)
        .setLngLat([-76.60629896975081,2.442076339884687])
        .addTo(map);
        
        const marker3 = new mapboxgl.Marker()
        .setPopup(popup3)
        .setLngLat([-76.59896044618817,2.4437163599587035])
        .addTo(map);

        const marker4 = new mapboxgl.Marker()
        .setPopup(popup4)
        .setLngLat([-76.60607366415228,2.4441558421455563])
        .addTo(map);

        const marker5 = new mapboxgl.Marker()
        .setPopup(popup5)
        .setLngLat([-76.59953980330788,2.446363969866369])
        .addTo(map);
        
        const chapters = {
           'claustro': {
            bearing: 27,
            center: [-76.60439996583395, 2.441947710791877],
            zoom: 15,
            pitch: 20
        },
        'parque': {
            duration: 6000,
            center:[-76.60629896975081,2.442076339884687],
            bearing: 27,
            zoom: 15,
            pitch: 0
        },
        'morro': {
            bearing: 27,
            center: [-76.59896044618817,2.4437163599587035],
            zoom: 15,
            speed: 0.6,
            pitch: 40
        },
        'puente': {
            bearing: 27,
            center: [-76.60607366415228,2.4441558421455563],
            zoom: 15
        },
        'unicauca': {
            bearing: 27,
            center: [-76.59953980330788,2.446363969866369],
            zoom: 15,
            pitch: 20,
            speed: 0.5
        },
        'caulfield-gardens': {
            bearing: 27,
            center: [-0.19684993, 51.5033856],
            zoom: 15
        },
        'telegraph': {
            bearing: 27,
            center: [-0.10669358, 51.51433123],
            zoom: 15,
            pitch: 40
        },
        'charing-cross': {
            bearing: 90,
            center: [-0.12416858, 51.50779757],
            zoom: 15,
            pitch: 20
        }
    };

    let activeChapterName = 'baker';
    function setActiveChapter(chapterName) {
       if (chapterName === activeChapterName) return;

       map.flyTo(chapters[chapterName]);

       document.getElementById(chapterName).classList.add('active');
       document.getElementById(activeChapterName).classList.remove('active');

       activeChapterName = chapterName;
   }

   function isElementOnScreen(id) {
       const element = document.getElementById(id);
       const bounds = element.getBoundingClientRect();
       return bounds.top < window.innerHeight && bounds.bottom > 0;
   }

    // On every scroll event, check which element is on screen
    window.onscroll = () => {
    	for (const chapterName in chapters) {
    		if (isElementOnScreen(chapterName)) {
    			setActiveChapter(chapterName);
    			break;
    		}
    	}
    };
</script>

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