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
          <h5><strong>Grado:</strong> Tercero &nbsp;<strong>Grupo:</strong> Grupo F</h5>
            <table class="table table-striped text-center">
                <thead>
                    <tr class="text-uppercase">
                        <th>Nombre</th>
                        <th>Periodo 1</th>
                        <th>Periodo 2</th>
                        <th>Periodo 3</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>Pedro Hernandez Najera</td>
                        <td>
                            <div class="form-group inline-block">
                                <input type="text" class="form-control" value="9">
                            </div>
                        </td>
                        <td>
                            <div class="form-group inline-block">
                                <input type="text" class="form-control" value="9">
                            </div>
                        </td>
                        <td>
                            <div class="form-group">
                                <input type="text" class="form-control" value="8">
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td>Maria Lurdes Gonzalez</td>
                        <td>
                            <div class="form-group inline-block">
                                <input type="text" class="form-control" value="9">
                            </div>
                        </td>
                        <td>
                            <div class="form-group inline-block">
                                <input type="text" class="form-control" value="9">
                            </div>
                        </td>
                        <td>
                            <div class="form-group">
                                <input type="text" class="form-control" value="8">
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td>Sara Teresa Sánchez del Pinar</td>
                        <td>
                            <div class="form-group inline-block">
                                <input type="text" class="form-control" value="9">
                            </div>
                        </td>
                        <td>
                            <div class="form-group inline-block">
                                <input type="text" class="form-control" value="9">
                            </div>
                        </td>
                        <td>
                            <div class="form-group">
                                <input type="text" class="form-control" value="8">
                            </div>
                        </td>
                    </tr>
                </tbody>
            </table>
            <button type="submit" class="btn btn-primary mt-3 text-uppercase">Registrar</button>
            <button type="reset" class="btn btn-danger mt-3 text-uppercase">Borrar todo</button>
            <a href="javascript:history.back();" class="btn btn-info mt-3 text-uppercase">Cancelar</a>
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