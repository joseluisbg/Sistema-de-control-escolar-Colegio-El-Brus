@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
@stop

@section('content')
<div class="container-fluid pt-3">
    <h3 class="text-uppercase">Control de administrador</h3>
    <div class="row p-4 justify-content-center">
        <div class="col-xs-12 col-sm-6 col-md-3 col-lg-3 col-offset-3">
            <div class="small-box bg-success shadow">
              <div class="inner">
                <h3>{{ $activos }}</h3>
                <p>Activos</p>
              </div>
              <div class="icon">
                <i class="fas fa-check-circle"></i>
              </div>
            </div>
        </div>
        <div class="col-xs-12 col-sm-6 col-md-3 col-lg-3 col-offset-3">
            <div class="small-box bg-info shadow">
              <div class="inner">
                <h3>{{ $suspendidos }}</h3>
                <p>Suspendidos</p>
              </div>
              <div class="icon">
                <i class="fas fa-hand-paper"></i>
              </div>
            </div>
        </div>
    </div>
</div>
<div class="container-fluid mb-3">
  <div class="row justify-content-center">
    <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6 col-offset-3">
      <div class="card">
        <div class="card-body">
            <div class="form-group">
              <p class="text-uppercase text-center font-weight-bold">Registro masivo</p>
                <form method="post" action="{{ route('ce.import.excel') }}" enctype="multipart/form-data">
                    @csrf
                    @if(Session::has('message'))
                    <p>{{Session::get('message')}}</p>
                    @endif
                    <input class="form-group" type="file" name="file" required>
                    <button type="submit" class="btn btn-outline-primary btn-block text-uppercase">Importar</button>
                </form>
            </div>
        </div>
      </div>
    </div>
    <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6 col-offset-3">
      <div class="card">
        <div class="card-body">
          <p class="text-uppercase text-center font-weight-bold">Registrar administrador</p>
          <a href="{{ route('admin.school.control.create') }}" class="btn btn-outline-primary text-uppercase btn-block">Crear</a>
        </div>
      </div>
    </div>
  </div>
</div>

@livewire('admin.school-control.school-control-index')
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
@if(session('Registrar') == 'ok') {
    <script>
    Swal.fire('¡Administrador registrado!', '', 'success')
    </script>
  }
  @endif
  @if(session('Actualizar') == 'ok') {
    <script>
    Swal.fire('¡Administrador actualizado!', '', 'success')
    </script>
  }
  @endif
  @if(session('Suspendido') == 'ok') {
    <script>
    Swal.fire('¡Administrador suspendido!', '', 'success')
    </script>
  }
  @endif
  @if(session('Activo') == 'ok') {
    <script>
    Swal.fire('¡Administrador activo!', '', 'success')
    </script>
  }
  @endif
@stop