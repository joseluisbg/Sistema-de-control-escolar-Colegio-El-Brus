@extends('adminlte::page')

@section('title', 'Escritorio')

@section('content_header')
@stop

@section('content')
<div class="container-fluid pt-3">
    <div class="row">
        <div class="col-md-12">
            <h3 class="text-uppercase font-weight-bold mb-4">Listado de grupos asignados</h3>
            <div class="card">
                <div class="card-body">
                    <h3 class="text-uppercase font-weight-bold mb-4">Grupos</h3>

                    <table class="table table-striped text-center">
                        <thead>
                            <tr class="text-uppercase">
                                <th>Nombre</th>
                                <th>Grado</th>
                                <th>Materia</th>
                                <th>Ver</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($grupos as $grupo)
                            <tr>
                                <td>{{ $grupo->nameGroup }}</td>
                                <td>{{ $grupo->nameLevel }}</td>
                                <td>{{ $grupo->nameCourse }}</td>
                                <td width="10px">
                                    <a href="{{ route('admin.evaluations.edit',  $grupo->idlg) }}" class="btn btn-primary">
                                        <span class="fas fa-sign-in-alt"></span>
                                    </a>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                    @if(count($grupos) <= 0)
                    <tr>
                        <div class="card-body p-3">
                            <strong style="text-transform: uppercase; color: red;">No tienes grupos asignados.</strong>
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