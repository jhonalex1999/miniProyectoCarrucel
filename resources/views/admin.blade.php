@extends('layouts.app')

@section('content')
<div class="container">
    <div class="col-md-2"></div>
    <div class="row justify-content-center">
        
            <div style="margin: 10px;">
                  <div class="card" style="width: 18rem;">
                    <img  src="/imagenes/canasta.png" class="card-img-top" alt="..." width="250" height="250">
                    <div class="card-body">
                     <h5 class="card-title">CRUD Canasta</h5>
                     <p class="card-text">Ingresa para Crear, Editar y Eliminar productos de la canasta</p>
                     <a href="/canasta" class="btn btn-primary">Gestionar</a>
                    </div>
                </div>
        </div>
           <div style="margin: 10px;">
                  <div class="card" style="width: 18rem;">
                    <img src="/imagenes/emprender.jpg" class="card-img-top" alt="..."  width="250" height="250">
                    <div class="card-body">
                     <h5 class="card-title">CRUD Emprendimientos</h5>
                     <p class="card-text">Ingresa para Crear, Editar y los emprendimientos</p>
                     <a href="/organizacion" class="btn btn-primary">Gestionar</a>
                    </div>
                </div>
        </div>
           <div style="margin: 10px;">
                  <div class="card" style="width: 18rem;">
                    <img src="/imagenes/agricultura.jpg" class="card-img-top" alt="..."  width="250" height="250">
                    <div class="card-body">
                     <h5 class="card-title">CRUD Agro Oferta</h5>
                     <p class="card-text">Ingresa para Crear, Editar y Eliminar los productos de Agro Ofertas</p>
                     <a href="/oferta" class="btn btn-primary">Gestionar</a>
                    </div>
                </div>
        </div>
           <div style="margin: 10px;">
                  <div class="card" style="width: 18rem;">
                    <img src="/imagenes/inversionistas.jpg" class="card-img-top" alt="..."  width="250" height="250">
                    <div class="card-body">
                     <h5 class="card-title">CRUD Inversionistas</h5>
                     <p class="card-text">Ingresa para Crear, Editar y Eliminar los inversionistas</p>
                     <a href="/inversionista" class="btn btn-primary">Gestionar</a>
                    </div>
                </div>
        </div>
          
    </div>
</div>
@endsection
