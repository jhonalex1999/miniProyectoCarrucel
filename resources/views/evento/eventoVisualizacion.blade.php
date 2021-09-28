<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Fly to a location based on scroll position</title>
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
		#map { position: static; top: 30; bottom: 700; height:500px;width:400px; }
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
         position: fixed;
         width: 50%;
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
<div class="container">
     <div id="map"></div>
    
</div>

 <div id="features">
  <section id="claustro" class="active">
     <h3>Claustro Santo Domingo</h3>
     <p>
        November 1895. London is shrouded in fog and Sherlock Holmes and
        Watson pass time restlessly awaiting a new case. "The London
        criminal is certainly a dull fellow," Sherlock bemoans. "There have
        been numerous petty thefts," Watson offers in response. Just then a
        telegram arrives from Sherlock's brother Mycroft with a mysterious
        case.
    </p>
</section>
<section id="parque">
 <h3>Parque Caldas</h3>
 <p>
    Arthur Cadogan West was found dead, head crushed in on train tracks
    at Aldgate Station at 6AM Tuesday morning. West worked at Woolwich
    Arsenal on the Bruce-Partington submarine, a secret military
    project. Plans for the submarine had been stolen and seven of the
    ten missing papers were found in West's possession. Mycroft implores
    Sherlock to take the case and recover the three missing papers.
</p>
</section>
<section id="morro">
 <h3>Morro de Tulcan</h3>
 <p>
    Holmes and Watson's investigations take them across London. Sherlock
    deduces that West was murdered elsewhere, then moved to Aldgate
    Station to create the illusion that he was crushed on the tracks by
    a train. On their way to Woolwich Sherlock dispatches a telegram to
    Mycroft at London Bridge: "Send list of all foreign spies known to
    be in England, with full address."
</p>
</section>
<section id="puente">
 <h3>Puente del Humilladero</h3>
 <p>
    While investigating at Woolwich Arsenal Sherlock learns that West
    did not have the three keys&mdash;door, office, and
    safe&mdash;necessary to steal the papers. The train station clerk
    mentions seeing an agitated West boarding the 8:15 train to London
    Bridge. Sherlock suspects West of following someone who had access
    to the Woolwich chief's keyring with all three keys.
</p>
</section>
<section id="unicauca">
 <h3>Universidad del Cauca Facultad FIET</h3>
 <p>
    Mycroft responds to Sherlock's telegram and mentions several spies.
    Hugo Oberstein of 13 Caulfield Gardens catches Sherlock's eye. He
    heads to the nearby Gloucester Road station to investigate and
    learns that the windows of Caulfield Gardens open over rail tracks
    where trains stop frequently.
</p>
</section>
<section id="caulfield-gardens">
 <h3>13 Caulfield Gardens</h3>
 <p>
    Holmes deduces that the murderer placed West atop a stopped train at
    Caulfield Gardens. The train traveled to Aldgate Station before
    West's body finally toppled off. Backtracking to the criminal's
    apartment, Holmes finds a series of classified ads from
    <em>The Daily Telegraph</em> stashed away. All are under the name
    Pierrot: "Monday night after nine. Two taps. Only ourselves. Do not
    be so suspicious. Payment in hard cash when goods delivered."
</p>
</section>
<section id="telegraph">
 <h3>The Daily Telegraph</h3>
 <p>
    Holmes and Watson head to The Daily Telegraph and place an ad to
    draw out the criminal. It reads: "To-night. Same hour. Same place.
    Two taps. Most vitally important. Your own safety at stake.
    Pierrot." The trap works and Holmes catches the criminal: Colonel
    Valentine Walter, the brother of Woolwich Arsenal's chief. He
    confesses to working for Hugo Oberstein to obtain the submarine
    plans in order to pay off his debts.
</p>
</section>
<section id="charing-cross">
 <h3>Charing Cross Hotel</h3>
 <p>
    Walter writes to Oberstein and convinces him to meet in the smoking
    room of the Charing Cross Hotel where he promises additional plans
    for the submarine in exchange for money. The plan works and Holmes
    and Watson catch both criminals.
</p>
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
            'Claustro Santo Domingo'
            );
        const popup2 = new mapboxgl.Popup({ offset: 50 }).setText(
            'Parque Caldas'
            );
        const popup3 = new mapboxgl.Popup({ offset: 50 }).setText(
            'El Morro'
            );
        const popup4 = new mapboxgl.Popup({ offset: 50 }).setText(
            'Puente del humilladero'
            );
        const popup5 = new mapboxgl.Popup({ offset: 50 }).setText(
            'Universidad del Cauca'
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