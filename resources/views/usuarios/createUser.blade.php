@extends('layouts.base')

@section('contenido')
<h2>Ingrese sus datos</h2>
<title>Registro</title>
@if (session('status'))
    <div class="alert alert-success" role="alert">
      {{ session('status') }}
    </div>
@endif
@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
<form  action="{{ route('usuarios.store') }}" method="POST" enctype="multipart/form-data">
    @csrf
    <div class="mb-3">
      <label for="" class="form-label">Primer Nombre</label>
      <input type="text" class="form-control" maxlength="100" placeholder="Obligatorio" required name="primer_nombre" value="{{ old('primer_nombre') }}">
    </div>
    
    <div class="mb-3">
      <label for="" class="form-label">Segundo Nombre</label>
      <input type="text" class="form-control" maxlength="100" placeholder="Obligatorio" required name="segundo_nombre" value="{{ old('segundo_nombre') }}">
    </div>

    <div class="mb-3">
      <label for="" class="form-label">Tercer Nombre</label>
      <input type="text" class="form-control" maxlength="100" placeholder="Opcional"  name="tercer_nombre" value="{{ old('tercer_nombre') }}">
    </div>

    <div class="mb-3">
      <label for="" class="form-label">Primer Apellido</label>
      <input type="text" class="form-control" maxlength="100" placeholder="Obligatorio" required name="primer_apellido" value="{{ old('primer_apellido') }}">
    </div>

    <div class="mb-3">
      <label for="" class="form-label">Segundo Apellido</label>
      <input type="text" class="form-control" maxlength="100" placeholder="Obligatorio" required name="segundo_apellido" value="{{ old('segundo_apellido') }}">
    </div>

    <div class="mb-3">
      <label for="" class="form-label">Apellido de Casada</label>
      <input type="text" class="form-control" maxlength="100" placeholder="Opcional" name="apellido_casada" value="{{ old('apellido_casada') }}">
    </div>

    <div class="mb-3">
      <label for="" class="form-label">Fecha de Nacimiento</label>
      <input type="date" class="form-control" placeholder="Obligatorio" required name="fecha_nacimiento" value="{{ old('fecha_nacimiento') }}">
    </div>

    <div class="mb-3">
      <label for="" class="form-label">Numero DPI</label>
      <input type="text" minlength="13" maxlength="13" class="form-control" placeholder="Obligatorio" required name="num_dpi" value="{{ old('num_dpi') }}">
    </div>

    <div class="mb-3">
      <label for="" class="form-label">Profesion</label>
      <input type="text"  class="form-control" placeholder="Opcional" maxlength="100" name="profesion" value="{{ old('profesion') }}">
    </div>

    <label for="" class="form-label">Foto</label>
    <div class="input-group mb-3">
      <input type="file" class="form-control" id="inputGroupFile02" name="foto" required value="{{ old('foto') }}">
      
    </div>
    <div class="mb-3">
      <label for="" class="form-label">Años Laborando</label>
      <input type="number"  class="form-control" placeholder="Opcional" name="anios_laborando" min="0" max="25" value="{{ old('anios_laborando') }}">
    </div>

    <label for="" class="form-label">Salario</label>
    <div class="input-group mb-3">
      <span class="input-group-text">Q</span>
      <input type="number" class="form-control" name="salario" min="0" max="50000" required placeholder="Obligatorio" value="{{ old('salario') }}">
      <span class="input-group-text">.00</span>
    </div>

    <div class="mb-3">
      <label for="" class="form-label">Correo Electrónico</label>
      <input type="email"  class="form-control" placeholder="Obligatorio" required name="email" value="{{ old('email') }}">
    </div>

    <input type="text"  class="form-control" hidden name="rol_id" value="3">

  <div class="my-4 text-center">
    <button type="button" onclick="history.back()" name="volver atrás" class="btn btn-secondary" tabindex="4">Cancelar</button>
    <button type="submit" class="btn btn-primary" tabindex="4">Guardar</button>
  </div>
</form>


@endsection