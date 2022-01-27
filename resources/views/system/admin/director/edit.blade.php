@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
@stop

@section('content')
<div class="container-fluid">
  <div class="row">
    <div class="col-md-12">
      <div class="card mt-4">
        <div class="card-body">
          <h3>Datos del director: <strong>{{ $student->name}}&nbsp;{{ $student->last_name }}</strong></h3>
          <form method="post" action="{{ route('admin.teacher.update',$student->id) }}">
          @method('put')
          @csrf
          <div class="row">
              <div class="col">
                <label>Nombre:</label>
                <input name="name" type="text" class="form-control" value="{{ $student->name }}">
              </div>
              <div class="col">
                <label>Apellidos:</label>
                <input name="last_name" type="text" class="form-control" value="{{ $student->last_name }}">
              </div>
              <div class="col">
                <label>CURP:</label>
                <input name="curp" type="text" class="form-control" value="{{ $student->curp }}">
              </div>
            </div>
            <div class="row pt-3">
              <div class="col">
                <label>RFC:</label>
                <input name="rfc" type="text" class="form-control" value="{{ $student->rfc }}">
              </div>
              <div class="col">
                <label>Teléfono:</label>
                <input name="tel_1" type="text" class="form-control" value="{{ $student->tel_1 }}">
              </div>
              <div class="col">
                <label>Celular:</label>
                <input name="tel_2" type="text" class="form-control" value="{{ $student->tel_2 }}">
              </div>
            </div>
            <div class="row pt-3">
              <div class="col-4">
                <label>Correo electrónico:</label>
                <input name="email" type="text" class="form-control" value="{{ $student->email }}">
              </div>
              <div class="col-4">
                <label>Contraseña:</label>
                <input name="password" type="text" class="form-control" placeholder="Ingresar la nueva contraseña">
              </div>
            </div>
            <button type="submit" class="btn btn-primary mt-3 text-uppercase">Actualizar</button>
            <a href="javascript:history.back();" class="btn btn-info mt-3 text-uppercase">Cancelar</a>
          </form>
        </div>
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