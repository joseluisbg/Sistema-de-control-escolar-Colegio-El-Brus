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
                    @if($students->count())
                    <form method="post" action="{{ route('admin.assignment.student.group.store') }}" class="form-registrar" autocomplete="off">
                        @csrf
                        @foreach($infolg as $infolg2)
                        <input type="text" class="form-control" name="id_lg" value="{{ $infolg2->idlg }}" style="display: none;">
                        @endforeach
                        @foreach($students as $student)
                        <div class="form-check">
                            <input type="checkbox" name="check_lista[]" value="{{ $student->id_student }}">
                            <label class="form-check-label" for="exampleRadios1">
                                {{ $student->name }}
                            </label>
                        </div>
                        @endforeach
                        <button type="submit" class="btn btn-primary">Asignar</button>
                    </form>
                    <div class="card-footer">
                        {{ $students->links() }}
                    </div>
                    @else
                    <div class="card-body p-3">
                        <strong style="text-transform: uppercase; color: red;">No existen registros.</strong>
                    </div>
                    @endif

                </div>
            </div>
        </div>
    </div>
</div>

<div class="container-fluid pt-3">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                @if($alumasign->count())
                <div class="card-body">
                    <p class="text-uppercase font-weight-bold mb-4">Alumnos de este grupo</p>

                    <table class="table table-striped text-center">
                        <thead>
                            <tr class="text-uppercase">
                                <th>Nombre</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($alumasign as $inf)
                            <tr>
                                <td>
                                    {{ $inf->nombre }}
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                @else
                <div class="card-body p-3">
                    <strong style="text-transform: uppercase; color: red;">No existen coincidencias.</strong>
                </div>
                @endif
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