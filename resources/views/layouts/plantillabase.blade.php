<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
   <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link href="{{ asset('css/base.css') }}" rel="stylesheet">
    <title>CRUD con Laravel 8 y Bootstrap 5</title>
  </head>
  <body >
       <nav id="navPrincipal" class="navbar navbar-expand-md " >
          <img id="icono" src="/imagenes/AgroCauca.png">
          <h2 id="tituloIcono">Cauca AgroSostenible</h2>
       </nav>
    <br>   
    <div class="container">
    
    <div class="container" id="contenido">
        @yield('contenido')
    </div>
    </div>
    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper.js -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-popRpmFF9JQgExhfw5tZT4I9/CI5e2QcuUZPOVXb1m7qUmeR2b50u+YFEYe1wgzy" crossorigin="anonymous"></script>

    <!-- Option 2: Separate Popper.js and Bootstrap JS
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-alpha3/dist/js/bootstrap.min.js" integrity="sha384-t6I8D5dJmMXjCsRLhSzCltuhNZg6P10kE0m0nAncLUjH6GeYLhRU1zfLoW3QNQDF" crossorigin="anonymous"></script>
    -->
  </body>
  <br>
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