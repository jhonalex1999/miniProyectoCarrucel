        @extends('layouts.app')

        @section('content')
        <div class="login-container">
                  <div class="login-info-container">
                    <h1 class="title">Registrate</h1>
                    <div class="social-login">
                        <div class="social-login-element">
                            <img src="/imagenes/agricultura.png" alt="agricultura">
                            <span>AgroCauca</span>
                        </div>
                        <div class="social-login-element">
                            <img src="/imagenes/seguridad.png" alt="seguridad">
                            <span>Seguridad</span>
                        </div>
                    </div>
                 
                    <form class="inputs-container" method="POST" action="{{ route('register') }}">
                        @csrf

                         <input id="name" placeholder="Nombre" type="text" class=" input form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                                        @error('name')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror

         <input id="email" type="email" placeholder="Correo" class="input form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

                                        @error('email')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror

          <input id="password" type="password" placeholder="Contraseña" class="input form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                                        @error('password')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror


          <input id="password-confirm" type="password" placeholder="Confirmar contraseña" class="input form-control" name="password_confirmation" required autocomplete="new-password">


             <input id="user" type="user" placeholder="Usuario" class="input form-control" name="user" >

                        <button type="submit" class="btn btn-primary">
                            {{ __('Registrar') }}
                        </button>
            
                    </form>
                 </div>
                 <img class="image-container" src="/imagenes/login.svg" alt="">
        </div>


          <link href="{{ asset('css/login.css') }}" rel="stylesheet">

        @endsection
