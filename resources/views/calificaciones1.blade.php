@extends('adminlte::page')

@section('title', 'Escritorio')

@section('content_header')
@stop

@section('content')
<div class="container-fluid pt-3">
  <div class="row">
    <div class="col-md-12">
      <div class="card">
        <div class="card-body">
          <h3 class="text-uppercase font-weight-bold mb-4">Asignación de calificaciones</h3>
          <p>Listado de grupos asignados:</p>
            <table class="table table-striped text-center">
                <thead>
                    <tr class="text-uppercase">
                        <th>Grado</th>
                        <th>Grupo</th>
                        <th>Nivel academico</th>
                        <th>Ver</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>Tercero</td>
                        <td>Grupo F</td>
                        <td>Primaria</td>
                        <td width="10px">
                            <a href="{{ url('sistema/asignacion/calificaiones/grupo') }}" class="btn btn-primary">
                                <span class="fas fa-sign-in-alt"></span>
                            </a>
                        </td>
                    </tr>
                    <tr>
                        <td>Tercero</td>
                        <td>Grupo A</td>
                        <td>Primaria</td>
                        <td width="10px">
                            <a href="" class="btn btn-primary">
                                <span class="fas fa-sign-in-alt"></span>
                            </a>
                        </td>
                    </tr>
                </tbody>
            </table>
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
    <script> console.log('Hi!'); </script>
@stop