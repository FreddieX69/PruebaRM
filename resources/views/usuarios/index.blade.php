@extends('layouts.base')

@section('contenido')
<title>Administrar</title>
@if  (session('status'))
    <div class="alert alert-success" role="alert">
        {{ session('status') }}
    </div>
@endif
@php
foreach ($usuarios as  $usuario) {
    if ($usuario->email == session('email')) {
        $user = $usuario;
        break;
    }
} 
@endphp
@if ($user->rol_id == 1)
<a href="{{ route('usuarios.create') }}" type="submit" class="btn btn-primary mb-3">CREAR NUEVO USUARIO</a>
@endif
<table  class="table table-striped mt-10 " >
        <thead>
            <th scope="col">No.</th>
            <th scope="col">Nombre</th>
            <th scope="col">Apellido</th>
            <th scope="col">Email</th>
            <th scope="col">Profesion</th>
            <th scope="col">Rol</th> 
            <th scope="col">Estado</th> 
            <th scope="col">Acciones</th> 
            <th scope="col"></th> 
        </thead>
        <tbody>
          @foreach ($usuarios as $usuario)
                  <td>{{$usuario->id}}</td>
                  <td>{{$usuario->primer_nombre}}</td>
                  <td>{{$usuario->primer_apellido}}</td>
                  <td>{{$usuario->email}}</td>
                  <td class="col-2">{{$usuario->profesion}}</td>
                  <td class="text-capitalize">{{$usuario->rol->nombre_rol}}</td>
                  <td class="text-capitalize">@if ($usuario->rol_id == 3 ) {{$usuario->estado->nombre_estado}} @else No aplica @endif</td>
                  
                  <td colspan="2">
                      <a href="{{ route('usuarios.show', $usuario->id) }}" class="btn btn-info">Ver</a>
                      @if ($user->rol_id == 1)
                      <a href="{{ route('usuarios.edit', $usuario->id) }}" class="btn btn-success">Editar</a>
                      <button data-bs-toggle="modal" data-bs-target="#exampleModal" type="button" class="btn btn-danger" @if ($usuario->id ==1) disabled @endif>Borrar</button>
                      @endif
                  </td>
              </tr>
          @endforeach
        </tbody>
</table>
  <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">ATENCION</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          Esta opción es irreversible ¿Está seguro de eliminar este registro?
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
          
          <form action="{{ route('usuarios.destroy',$usuario->id) }}" method="POST" style="display: inline">
            @method('DELETE')
            @csrf
            <button type="submit" class="btn btn-danger">Eliminar</button>
          </form>
        </div>
      </div>
    </div>
  </div>
@endsection
