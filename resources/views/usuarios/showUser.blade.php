@extends('layouts.base')

@section('contenido')
<h1 class="text-center">Datos de Usuario</h1>
<title>Datos</title>

<div class="card mx-auto shadow-lg" style="width: 600px">
  <img src="{{ url('storage/'.$usuario->foto) }}" class="card-img-top" alt="...">
  <div class="card-body">
    <h4 class="card-title text-center">Datos Personales</h4>
    <p class="card-text"><span class="fw-bold">Nombre Completo: </span>{{ $usuario->primer_nombre.' '.$usuario->segundo_nombre.' '.$usuario->tercer_nombre.' '.$usuario->primer_apellido.' '.$usuario->segundo_apellido.' '.$usuario->apellido_casada }}</p>
    <p class="card-text"><span class="fw-bold">Fecha de Nacimiento: </span>{{ $usuario->fecha_nacimiento }}</p>
    <p class="card-text"><span class="fw-bold">Numero de DPI: </span>{{ $usuario->num_dpi }}</p>
    <p class="card-text"><span class="fw-bold">Profesion: </span>{{ $usuario->profesion }}</p>
    <p class="card-text"><span class="fw-bold">Años Laborando: </span>{{ $usuario->anios_laborando }}</p>
    <p class="card-text"><span class="fw-bold">Correo Electronico: </span>{{ $usuario->email }}</p>
    <p class="card-text"><span class="fw-bold">Salario: </span>{{ 'Q.'.$usuario->salario.'.00' }}</p>
    <p class="card-text" >
      <span class="fw-bold" >Estado de Solicitud: </span>
      @switch ( $usuario->estado_id )
        @case(1)
          @php $bg = 'bg-danger'; $icon = 'bi bi-person-x-fill' @endphp 
          @break 
        @case(2) 
          @php $bg = 'bg-success'; $icon = 'bi bi-person-check-fill' @endphp
          @break 
        @default
          @php $bg = 'bg-warning'; $icon = 'bi bi-person-dash-fill' @endphp
          @break 
      @endswitch  

      <div class="card {{ $bg }} col-4 text-center mx-auto">
        <span class="text-light text-capitalize fs-4">
          <i class="{{ $icon }}"></i>
          {{ $usuario->estado->nombre_estado }}
        </span>
      </div>
    </p>
  </div>
</div>


@endsection