@extends('layouts.app')

@section('body-class', 'signup-page')

@section('content')
<div class="header header-filter" style="background-image: url('{{ asset('/img/city.jpg') }}'); background-size: cover; background-position: top center;">
  <div class="container">
    <div class="row">
      <div class="col-md-4 col-md-offset-4 col-sm-6 col-sm-offset-3">
        <div class="card card-signup">
          <form method="POST" action="{{ route('register') }}">
            @csrf
            <div class="header header-primary text-center">
              <h4>Registro</h4>
              <!-- <div class="social-line">
                <a href="#" class="btn btn-simple btn-just-icon">
                  <i class="fa fa-facebook-square"></i>
                </a>
                <a href="#" class="btn btn-simple btn-just-icon">
                  <i class="fa fa-twitter"></i>
                </a>
                <a href="#" class="btn btn-simple btn-just-icon">
                  <i class="fa fa-google-plus"></i>
                </a>
              </div> -->
            </div>
            <p class="text-divider">Completa tus datos</p>
            <div class="content">
              <!-- Nombre para registro -->
              <div class="input-group">
                <span class="input-group-addon">
                  <i class="material-icons">face</i>
                </span>
                <input type="text" class="form-control" placeholder="Nombre" name="name" value="{{ old('name') }}" required autofocus>
              </div>
              <!-- Email para Registro  -->
              <div class="input-group">
                <span class="input-group-addon">
                  <i class="material-icons">email</i>
                </span>
                <input id="email" type="email" placeholder="Correo electrónico" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required autofocus>
              </div>
              <!-- Password para Registro  -->
              <div class="input-group">
                <span class="input-group-addon">
                  <i class="material-icons">lock_outline</i>
                </span>
                <input id="password" type="password" placeholder="Contraseña" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required />
              </div>
              <!-- Verificar Password para Registro  -->
              <div class="input-group">
                <span class="input-group-addon">
                  <i class="material-icons">lock_outline</i>
                </span>
                <input type="password" placeholder="Confirmar contraseña" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password_confirmation" required />
              </div>

            <div class="footer text-center">
              <button type="submit" class="btn btn-simple btn-primary btn-lg">Confirmar registro</a>
            </div>
            <!-- <a class="btn btn-link" href="{{ route('password.request') }}">
                {{ __('Forgot Your Password?') }}
            </a> -->
          </form>
        </div>
      </div>
    </div>
  </div>

  @include('includes.footer')
</div>
@endsection
