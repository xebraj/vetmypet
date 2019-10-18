@extends('layouts.form')

@section('title', 'Registro')
@section('subtitle', 'Ingresa tus datos para registrarte!')


@section('content')
<div class="container mt--8 pb-5">
  <!-- Table -->
  <div class="row justify-content-center">
    <div class="col-lg-6 col-md-8">
      <div class="card bg-secondary shadow border-0">
        <div class="card-body px-lg-5 py-lg-5">

          @if ($errors->any())
          <div class="alert alert-danger" role="alert">
            {{ $errors->first() }}
          </div>
          @endif

          <form method="POST" action="{{ route('register') }}">
            @csrf

            <div class="form-group">
              <div class="input-group input-group-alternative mb-3">
                <div class="input-group-prepend">
                  <span class="input-group-text"><i class="ni ni-key-25"></i></span>
                </div>
                <input class="form-control" placeholder="Cédula" type="text" name="ci" value="{{ old('ci') }}"  title="Debe contener solo 8 digitos" required autofocus>
              </div>
            </div>
            <div class="form-group">
              <div class="input-group input-group-alternative mb-3">
                <div class="input-group-prepend">
                  <span class="input-group-text"><i class="ni ni-hat-3"></i></span>
                </div>
                <input class="form-control" placeholder="Nombre" type="text" name="name" value="{{ old('name') }}"  title="Debe contener solo letras" required autofocus>
              </div>
            </div>
            <div class="form-group">
              <div class="input-group input-group-alternative mb-3">
                <div class="input-group-prepend">
                  <span class="input-group-text"><i class="ni ni-single-02"></i></span>
                </div>
                <input class="form-control" placeholder="Apellidos" type="text" name="last_name" value="{{ old('last_name') }}"  required>
              </div>
              <div class="form-group">
                <div class="input-group input-group-alternative mb-3">
                  <div class="input-group-prepend">
                    <span class="input-group-text"><i class="ni ni-pin-3"></i></span>
                  </div>
                  <input class="form-control" placeholder="Dirección" type="text" name="address" value="{{ old('address') }}" title="Debe contener solo letras" required>
                </div>
                <div class="form-group">
                  <div class="input-group input-group-alternative mb-3">
                    <div class="input-group-prepend">
                      <span class="input-group-text"><i class="ni ni-mobile-button"></i></span>
                    </div>
                    <input class="form-control " data-toggle="tooltip" data-placement="right" title="Ej: 0424-139-4295" placeholder="Teléfono" type="tel" name="phone_number" value="{{ old('phone_number') }}" pattern="[0-9]{4}-[0-9]{3}-[0-9]{4}" required>
                  </div>

                </div>
                <div class="form-group">
                  <div class="input-group input-group-alternative mb-3">
                    <div class="input-group-prepend">
                      <span class="input-group-text"><i class="ni ni-email-83"></i></span>
                    </div>
                    <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" placeholder="Email" name="email" value="{{ old('email') }}" title="xxx@xxx.xxx" required>
                  </div>
                </div>
                <div class="form-group">
                  <div class="input-group input-group-alternative">
                    <div class="input-group-prepend">
                      <span class="input-group-text"><i class="ni ni-lock-circle-open"></i></span>
                    </div>
                    <input class="form-control" placeholder="Contraseña" type="password" name="password" required>
                  </div>
                </div>
                <div class="form-group">
                  <div class="input-group input-group-alternative">
                    <div class="input-group-prepend">
                      <span class="input-group-text"><i class="ni ni-lock-circle-open"></i></span>
                    </div>
                    <input class="form-control" placeholder="Confirmar contraseña" type="password" name="password_confirmation" required>
                  </div>
                </div>
                <div class="text-center">
                  <button type="submit" class="btn btn-primary mt-4">Confirmar registro</button>
                </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection