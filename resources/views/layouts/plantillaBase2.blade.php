<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
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

    <!-- Styles -->

  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link href="{{ asset('css/organizacion.css') }}" rel="stylesheet">
  
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-expand-lg  navbar-dark" id="navPrincipal">
          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="collapsibleNavbar">
            <ul class="navbar-nav">
              <img id="icono" src="/imagenes/AgroCauca.png">
              <h2 id="tituloIcono">AgroCauca</h2>
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
                  <a class="nav-link active" href="#" >Eventos</a>
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
     
    

     </div>
    
        <main class="py-4">
            @yield('content')
        </main>
 
<div class="jumbotron text-center" style="margin-bottom:0" id="footerP">
  <p>Footer</p>
   
</div>
</body>

</html>
