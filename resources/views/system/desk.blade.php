@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
@stop

@section('content')
<div class="container-fluid mt-4">
    <div class="row p-4">
        <div class="col-xs-12 col-sm-6 col-md-3 col-lg-3">
            <div class="small-box bg-success shadow">
              <div class="inner">
                <h3>156</h3>
                <p>Alumnos registrados</p>
              </div>
              <div class="icon">
                <i class="fas fa-check-circle"></i>
              </div>
            </div>
        </div>
        <div class="col-xs-12 col-sm-6 col-md-3 col-lg-3">
            <div class="small-box bg-info shadow">
              <div class="inner">
                <h3>6</h3>
                <p>Docentes</p>
              </div>
              <div class="icon">
                <i class="fas fa-hand-paper"></i>
              </div>
            </div>
        </div>
        <div class="col-xs-12 col-sm-6 col-md-3 col-lg-3">
            <div class="small-box bg-danger shadow">
              <div class="inner">
                <h3>15</h3>
                <p>Grupos</p>
              </div>
              <div class="icon">
                <i class="fas fa-user-times"></i>
              </div>
            </div>
        </div>
        <div class="col-xs-12 col-sm-6 col-md-3 col-lg-3">
            <div class="small-box bg-warning shadow">
              <div class="inner">
                <h3>2</h3>
                <p>Materias</p>
              </div>
              <div class="icon">
                <i class="fas fa-notes-medical"></i>
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
