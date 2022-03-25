@extends('layouts.base')

@section('contenido')
<h2>Editar Usuario</h2>
<title>Registro</title>

@if  (session('status'))
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
<form action="{{ route('usuarios.update',$usuario->id) }}" method="POST" enctype="multipart/form-data">
    @method('PUT')
    @csrf
    <div class="mb-3">
      <label for="" class="form-label">Primer Nombre</label>
      <input type="text" class="form-control" maxlength="100" placeher="Obligatorio" required name="primer_nombre" value="{{ $usuario->primer_nombre }}">
    </div>
    
    <div class="mb-3">
      <label for="" class="form-label">Segundo Nombre</label>
      <input type="text" class="form-control" maxlength="100" placeher="Obligatorio" required name="segundo_nombre" value="{{ $usuario->segundo_nombre }}">
    </div>

    <div class="mb-3">
      <label for="" class="form-label">Tercer Nombre</label>
      <input type="text" class="form-control" maxlength="100" placeher="Opcional"  name="tercer_nombre" value="{{ $usuario->tercer_nombre}}">
    </div>

    <div class="mb-3">
      <label for="" class="form-label">Primer Apellido</label>
      <input type="text" class="form-control" maxlength="100" placeher="Obligatorio" required name="primer_apellido" value="{{ $usuario->primer_apellido }}">
    </div>

    <div class="mb-3">
      <label for="" class="form-label">Segundo Apellido</label>
      <input type="text" class="form-control" maxlength="100" placeher="Obligatorio" required name="segundo_apellido" value="{{ $usuario->segundo_apellido }}">
    </div>

    <div class="mb-3">
      <label for="" class="form-label">Apellido de Casada</label>
      <input type="text" class="form-control" maxlength="100" placeher="Opcional" name="apellido_casada" value="{{ $usuario->apellido_casada}}">
    </div>

    <div class="mb-3">
      <label for="" class="form-label">Fecha de Nacimiento</label>
      <input type="date" class="form-control" placeher="Obligatorio" required name="fecha_nacimiento" value="{{ $usuario->fecha_nacimiento }}">
    </div>

    <div class="mb-3">
      <label for="" class="form-label">Numero DPI</label>
      <input type="text" minlength="13" maxlength="13" class="form-control" placeher="Obligatorio" required name="num_dpi" value="{{ $usuario->num_dpi }}">
    </div>

    <div class="mb-3">
      <label for="" class="form-label">Profesion</label>
      <input type="text"  class="form-control" placeher="Opcional" maxlength="100" name="profesion" value="{{ $usuario->profesion }}">
    </div>

    <label class="form-label">Foto: </label>
    <img width="250px" class="rounded mx-auto d-block" src="{{ url('storage/'.$usuario->foto) }}" >
    <div class="input-group my-3">
      <input type="file" class="form-control" id="inputGroupFile02" name="foto" value="{{ $usuario->foto }}">
    </div>

    <div class="mb-3">
      <label for="" class="form-label">Años Laborando</label>
      <input type="number"  class="form-control" placeher="Opcional" name="anios_laborando" min="0" max="25" value="{{ $usuario->anios_laborando }}">
    </div>

    <label for="" class="form-label">Salario</label>
    <div class="input-group mb-3">
      <span class="input-group-text">Q</span>
      <input type="number" class="form-control" name="salario" min="0" max="50000" required placeher="Obligatorio" value="{{ $usuario->salario }}">
      <span class="input-group-text">.00</span>
    </div>

    <div class="mb-3">
      <label for="" class="form-label">Correo Electrónico</label>
      <input type="email"  class="form-control" placeher="Obligatorio" required name="email" value="{{ $usuario->email }}">
    </div>

  @if ($usuario->rol_id != 1)
    <div>
      <label class="form-label" >Seleccione el Rol</label>
        <select class="form-select" name="rol_id" >
          <option value="3" @if ($usuario->rol_id == 3) selected @endif >Solicitante</option>
          <option value="2"  @if ($usuario->rol_id == 2) selected @endif>Operador</option>
        </select>
   </div >
  @endif

  <div class="my-4 text-center">
  <a href="/usuarios" class="btn btn-secondary" tabindex="5">Cancelar</a>
  <button type="submit" class="btn btn-primary" tabindex="4" >Actualizar</button>
  </div>
</form>



@endsection