    @extends('layouts.app')

    @section('content')


        <div class="login-container">
              <div class="login-info-container">
                <h1 class="title">Iniciar Sesion</h1>
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
                <br>
                <form method="POST" action="{{ route('login') }}" class="inputs-container">
                    @csrf    
                       <input id="user" type="text" placeholder="Usario" class="input form-control{{ $errors->has('user') ? ' is-invalid' : '' }}" name="user" value="{{ old('user') }}" required autofocus>
                            @if ($errors->has('user'))
                             <span class="invalid-feedback">
                                 <strong>{{ $errors->first('user') }}</strong>
                              </span>
                             @endif

                     <input id="password" placeholder="Contraseña" type="password" class="input form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                                    @error('password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                
                    <button type="submit" class="btn btn-primary">
                                        {{ __('Iniciar') }}
                    </button>
                      <p>No tienes una cuenta? <a href="register">Registrate</a></p>
                </form>
              </div>
                <img class="image-container" src="/imagenes/login.svg" alt="">
          </div>

      <link href="{{ asset('css/login.css') }}" rel="stylesheet">
    @endsection
