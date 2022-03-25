@extends('layouts.base')

@section('contenido')
<h2>Datos de Usuario</h2>
<title>Datos</title>

@if  (session('status'))
    <div class="alert alert-success" role="alert">
        {{ session('status') }}
    </div>
@endif

<div class="mb-3">
    <label for="" class="form-label">Primer Nombre</label>
    <input disabled type="text" class="form-control"  value="{{ $usuario->primer_nombre }}">
  </div>
  
  <div class="mb-3">
    <label for="" class="form-label">Segundo Nombre</label>
    <input disabled  type="text" class="form-control"  value="{{ $usuario->segundo_nombre }}">
  </div>

  <div class="mb-3">
    <label for="" class="form-label">Tercer Nombre</label>
    <input disabled type="text" class="form-control"  value="{{ $usuario->tercer_nombre}}">
  </div>

  <div class="mb-3">
    <label for="" class="form-label">Primer Apellido</label>
    <input disabled type="text" class="form-control"  value="{{ $usuario->primer_apellido }}">
  </div>

  <div class="mb-3">
    <label for="" class="form-label">Segundo Apellido</label>
    <input disabled type="text" class="form-control"  value="{{ $usuario->segundo_apellido }}">
  </div>

  <div class="mb-3">
    <label for="" class="form-label">Apellido de Casada</label>
    <input disabled type="text" class="form-control" value="{{ $usuario->apellido_casada}}">
  </div>

  <div class="mb-3">
    <label for="" class="form-label">Fecha de Nacimiento</label>
    <input disabled type="date" class="form-control" value="{{ $usuario->fecha_nacimiento }}">
  </div>

  <div class="mb-3">
    <label for="" class="form-label">Numero DPI</label>
    <input disabled type="text" class="form-control"  value="{{ $usuario->num_dpi }}">
  </div>

  <div class="mb-3">
    <label for="" class="form-label">Profesion</label>
    <input type="text" disabled class="form-control"  value="{{ $usuario->profesion }}">
  </div>

  <div class="input-group mb-3">
    <label for="" class="form-label " >Foto</label> 
    <img width="250px" class="rounded mx-auto d-block" src="{{ url('storage/'.$usuario->foto) }}" >
  </div>

  <div class="mb-3">
    <label for="" class="form-label">Años Laborando</label>
    <input disabled type="number"  class="form-control"  value="{{ $usuario->anios_laborando }}">
  </div>

  <label for="" class="form-label">Salario</label>
  <div class="input-group mb-3">
    <span class="input-group-text">Q</span>
    <input disabled type="number" class="form-control" value="{{ $usuario->salario }}">
    <span class="input-group-text">.00</span>
  </div>

  <div class="mb-3">
    <label  class="form-label">Correo Electrónico</label>
    <input disabled type="email"  class="form-control" value="{{ $usuario->email }}">
  </div>

  <div class="mb-3">
    <label class="form-label">Rol</label>
    <input disabled type="text"  class="form-control text-capitalize"  value="{{ $usuario->rol->nombre_rol }}">
  </select>
</div>

@if ($usuario->rol_id ==3) 
<div class="mb-3">
  <label class="form-label">Estado</label>
  <input disabled type="text"  class="form-control text-capitalize"  value="{{ $usuario->estado->nombre_estado }}">
</select>
</div>
@endif

@if ($usuario->rol_id ==3)
  <div class="my-4 text-center">
    @if ($usuario->estado_id !=2)
        <form action=" {{ route('estado') }}" method="POST" style="display: inline">
            @csrf
            <input type="text" name="id" value="{{$usuario->id }} " hidden>
            <input type="text" name="estado_id" value="2" hidden>
          <button type="submit" class="btn btn-success" tabindex="5" >ACEPTAR</button>
        </form>
    @endif
    @if ($usuario->estado_id !=1)
        <form action=" {{ route('estado') }}" method="POST" style="display: inline">
          @csrf
          <input type="text" name="id" value="{{$usuario->id }} " hidden>
          <input type="text" name="estado_id" value="1" hidden>
          <button type="submit" class="btn btn-danger" tabindex="5" >RECHAZAR</button>
      </form>
    @endif
  </div>
@endif



@endsection