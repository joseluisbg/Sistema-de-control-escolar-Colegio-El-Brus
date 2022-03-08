@extends('adminlte::page')

@section('title', 'Escritorio')

@section('content_header')
@stop

@section('content')
    <div class="pt-3 container-fluid">
        <div class="row">
            <div class="col-md-12">
                <h3 class="mb-4 text-uppercase font-weight-bold">Listado de grupos asignados</h3>
                <div class="card">
                    <div class="card-body">
                        <h3 class="mb-4 text-uppercase font-weight-bold">Grupos</h3>

                        <table class="table text-center table-striped">
                            <thead>
                                <tr class="text-uppercase">
                                    <th>Nombre</th>
                                    <th>Grado</th>
                                    <th>Materia</th>
                                    <th>Ver</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($grupos as $grupo)
                                    <tr>
                                        <td>{{ $grupo->nameGroup }}</td>
                                        <td>{{ $grupo->nameLevel }}</td>
                                        <td>{{ $grupo->nameCourse }}</td>
                                        <td width="10px">
                                            <a href="{{ route('admin.evaluations.edit', $grupo->id_lgct) }}"
                                                class="btn btn-primary">
                                                <span class="fas fa-sign-in-alt"></span>
                                            </a>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                        @if (count($grupos) <= 0)
                            <tr>
                                <div class="p-3 card-body">
                                    <strong style="text-transform: uppercase; color: red;">No tienes grupos
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
    <script>
        console.log('Hi!');
    </script>
@stop
