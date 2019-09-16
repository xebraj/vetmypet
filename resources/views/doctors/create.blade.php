@extends('layouts.panel')

@section('content')
<div class="card shadow">
    <div class="card-header border-0">
        <div class="row align-items-center">
            <div class="col">
                <h3 class="mb-0">Nuevo médico</h3>
            </div>
            <div class="col text-right">
                <a href="{{ url('doctors') }}" class="btn btn-sm btn-default">Cancelar y Volver</a>
            </div>
        </div>
    </div>
    <div class="card-body">
        @if ($errors->any())
        <div class="alert alert-danger" role="alert">
            <ul>
                @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        @endif

        <form action="{{ url('doctors') }}" method="post">
            @csrf
            <div class="form-group">
                <label for="name">Nombre del médico</label>
                <input type="text" name="name" class="form-control" value="{{ old('name') }}" required>
            </div>
            <div class="form-group">
                    <label for="last_name">Apellidos del médico</label>
                    <input type="text" name="name" class="form-control" value="{{ old('last_name') }}" required>
                </div>
            <div class="form-group">
                    <label for="email">E-mail</label>
                    <input type="text" name="email" class="form-control" value="{{ old('email') }}" >
                </div>
            <div class="form-group">
                    <label for="ci">Cédula</label>
                    <input type="text" name="ci" class="form-control" value="{{ old('ci') }}" >
            </div>
            <div class="form-group">
                    <label for="address">Dirección</label>
                    <input type="text" name="address" class="form-control" value="{{ old('address') }}" >
            </div>
            <div class="form-group">
                    <label for="phone_number">Teléfono / Móvil</label>
                    <input type="text" name="phone_number" class="form-control" value="{{ old('phone_number') }}" >
            </div>
            <button type="submit" class="btn btn-primary">
                Guardar
            </button>
        </form>
    </div>
</div>
@endsection