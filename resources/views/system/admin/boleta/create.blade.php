@extends('adminlte::page')

@section('title', 'Escritorio')

@section('content_header')
@stop

@section('content')
    <div class="container-fluid pt-3">
        <div class="row">
            <div class="col-md-12">
                <h3 class="text-uppercase font-weight-bold mb-4">Obtener boletas de alumnos</h3>
                <h5><strong>Grado:</strong> {{ $levelinfo->nameL }} &nbsp;<strong>Grupo:</strong>
                    {{ $levelinfo->nameG }}</h5>
                <div class="card">
                    <div class="card-body">
                        <h3 class="mb-4 text-uppercase font-weight-bold"></h3>

                        <table class="table text-center table-striped">
                            <thead>
                                <tr class="text-uppercase">
                                    <th>Nombre de alumno</th>
                                    <th>Obtener Boleta</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($students as $student)
                                    <tr>
                                        <td>{{ $student->nombre }}</td>
                                        <td>
                                            <a href="{{ route('boletas.export.alumno', $student->idEstudent) }}"
                                                class="btn btn-success">
                                                <span class="fas fa-file-excel"></span>
                                            </a>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                        @if (count($students) <= 0)
                            <tr>
                                <div class="p-3 card-body">
                                    <strong style="text-transform: uppercase; color: red;">No tienes grupos tutorados
                                        asignados.</strong>
                                </div>
                            </tr>
                        @endif
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
