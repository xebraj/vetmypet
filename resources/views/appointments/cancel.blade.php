@extends('layouts.panel')

@section('content')
<div class="card shadow">
    <div class="card-header border-0">
        <div class="row align-items-center">
            <div class="col">
                <h3 class="mb-0">Cancelar cita</h3>
            </div>
        </div>
    </div>
    <div class="card-body">
        @if (session('notification'))
        <div class="alert alert-success" role="alert">
            {{ session('notification') }}
        </div>
        @endif

    @if ($role == 'patient')
    <p class="alert alert-warning"><b>
        Estás a punto de cancelar tu cita reservada con el médico 
        {{ $appointment->doctor->name }} {{ $appointment->doctor->last_name }} 
        (especialidad {{ $appointment->specialty->name }}) 
        para el día {{ $appointment->scheduled_date }}
    </p></b>
    @elseif ($role == 'doctor')
    <p class="alert alert-warning"><b>
        Estás a punto de cancelar tu cita con el paciente
        {{ $appointment->patient->name }} {{ $appointment->patient->last_name }} 
        (especialidad {{ $appointment->specialty->name }}) 
        para el día {{ $appointment->scheduled_date }} (hora {{ $appointment->scheduled_time_12 }}):
    </p></b>
    @else
    <p class="alert alert-warning"><b>
        Estás a punto de cancelar la cita reservada por el paciente 
        {{ $appointment->patient->name }} {{ $appointment->patient->last_name }} para ser atendia por el médico
        {{ $appointment->doctor->name }} {{ $appointment->doctor->last_name }} 
        (especialidad {{ $appointment->specialty->name }}) 
        el día {{ $appointment->scheduled_date }}
        (hora {{ $appointment->scheduled_time_12 }}):
    </p></b>
    @endif

    <form action="{{ url('/appointments/'.$appointment->id.'/cancel') }}" method="POST">
        @csrf
        
        <div class="form-group">
            <label form="justificiation">Por favor especificar motivo de la cancelación:</label>
            <textarea id="justification" name="justification" rows="3" class="form-control" required></textarea>
        </div>
        
        <button class="btn btn-danger" type="submit">Cancelar cita</button>
        <a href="{{ url('/appointments') }}" class="btn btn-default">
            Volver al listado de citas sin cancelar
        </a>
        </form>
    </div>

</div>
@endsection