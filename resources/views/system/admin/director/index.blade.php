@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
@stop

@section('content')
<div class="container-fluid pt-3">
  <h3 class="text-uppercase">Control de directores</h3>
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
  <div class="row">
    <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
      <div class="card">
        <div class="card-body">

          <div class="form-group">
            <p class="text-uppercase text-center font-weight-bold">Registro masivo</p>
            <form action="{{ route('users.import.excel') }}" method="post" enctype="multipart/form-data">
              @csrf
              @if(Session::has('message'))
              <p>{{Session::get('message')}}</p>
              @endif
              <input type="file" name="file">
              <br><br>
              <button class="btn btn-outline-primary btn-block text-uppercase" role="submit">Importar</button>

          </div>
          </form>
        </div>
      </div>
    </div>
    <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
      <div class="card">
        <div class="card-body">
          <p class="text-uppercase text-center font-weight-bold">Registrar director</p>
          <a href="{{ route('admin.director.create') }}" class="btn btn-outline-primary text-uppercase btn-block">Crear</a>
        </div>
      </div>
    </div>
  </div>
</div>

@livewire('admin.director.director-index')

@stop

@section('css')
<link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')

@stop