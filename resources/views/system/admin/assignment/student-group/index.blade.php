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
                    <h3 class="text-uppercase font-weight-bold mb-4">Preescolar</h3>

                    <table class="table table-striped text-center">
                        <thead>
                            <tr class="text-uppercase">
                                <th>Grado</th>
                                <th>Grupo</th>
                                <th>Asignar</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($preescolar as $pre)
                            <tr>
                                <td>{{ $pre->nomL }}</td>
                                <td>{{ $pre->nomG }}</td>
                                <td width="10px">
                                    <a href="{{ route('admin.assignment.student.group.edit', $pre->idlg) }}" class="btn btn-primary">
                                        <span class="fas fa-sign-in-alt"></span>
                                    </a>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="container-fluid pt-3">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <h3 class="text-uppercase font-weight-bold mb-4">Primaria</h3>
                    <table class="table table-striped text-center">
                        <thead>
                            <tr class="text-uppercase">
                                <th>Grado</th>
                                <th>Grupo</th>
                                <th>Asignar</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($primaria as $pri)
                            <tr>
                                <td>{{ $pri->nomL }}</td>
                                <td>{{ $pri->nomG }}</td>
                                <td width="10px">
                                    <a href="{{ route('admin.assignment.student.group.edit', $pri->idlg) }}" class="btn btn-primary">
                                        <span class="fas fa-sign-in-alt"></span>
                                    </a>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="container-fluid pt-3">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <h3 class="text-uppercase font-weight-bold mb-4">Secundaria</h3>
                    <table class="table table-striped text-center">
                        <thead>
                            <tr class="text-uppercase">
                                <th>Grado</th>
                                <th>Grupo</th>
                                <th>Asignar</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($secundaria as $sec)
                            <tr>
                                <td>{{ $sec->nomL }}</td>
                                <td>{{ $sec->nomG }}</td>
                                <td width="10px">
                                    <a href="{{ route('admin.assignment.student.group.edit', $sec->idlg) }}" class="btn btn-primary">
                                        <span class="fas fa-sign-in-alt"></span>
                                    </a>
                                </td>
                            </tr>
                            @endforeach
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
@if(session('Registrar') == 'ok') {
    <script>
    Swal.fire('¡Alumno asignado a grupo!', '', 'success')
    </script>
  }
  @endif
@stop