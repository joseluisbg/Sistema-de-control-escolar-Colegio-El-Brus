@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
@stop

@section('content')
<div class="container-fluid pt-3">
  <div class="row">
    <div class="col-md-12">
      <div class="card">
        <div class="card-body">
          <h3 class="text-uppercase font-weight-bold mb-4">Crear un nuevo administrador</h3>
          <form method="post" action="{{ route('admin.school.control.store') }}">
            @csrf
            <div class="row">
              <div class="col">
                <label>Nombre:</label>
                <input name="name" type="text" class="form-control" placeholder="Ingresar el nombre(s)">
              </div>
              <div class="col">
                <label>Apellidos:</label>
                <input name="last_name" type="text" class="form-control" placeholder="Ingresar los apellidos">
              </div>
              <div class="col">
                <label>CURP:</label>
                <input name="curp" type="text" class="form-control" placeholder="Ingresar el CURP">
              </div>
            </div>
            <div class="row pt-3">
              <div class="col">
                <label>RFC:</label>
                <input name="rfc" type="text" class="form-control" placeholder="Ingresar el RFC">
              </div>
              <div class="col">
                <label>Teléfono:</label>
                <input name="tel_1" type="text" class="form-control" placeholder="Ingresar los teléfono">
              </div>
              <div class="col">
                <label>Celular:</label>
                <input name="tel_2" type="text" class="form-control" placeholder="Ingresar el celular">
              </div>
            </div>
            <div class="row pt-3">
              <div class="col-4">
                <label>Correo electrónico:</label>
                <input name="email" type="text" class="form-control" placeholder="Ingresar el correo electrónico">
              </div>
              <div class="col-4">
                <label>Contraseña:</label>
                <input name="password" type="text" class="form-control" placeholder="Ingresar la contraseña">
              </div>
            </div>
            <button type="submit" class="btn btn-primary mt-3 text-uppercase">Registrar</button>
            <button type="reset" class="btn btn-danger mt-3 text-uppercase">Borrar todo</button>
            <a href="javascript:history.back();" class="btn btn-info mt-3 text-uppercase">Cancelar</a>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')

@stop