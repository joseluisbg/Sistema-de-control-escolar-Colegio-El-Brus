@extends('adminlte::page')

@section('title', 'Escritorio')

@section('content_header')
@stop

@section('content')
<div class="container-fluid pt-3">
    <div class="row">
        <div class="col-md-12">
            <h3 class="text-uppercase font-weight-bold mb-4">Asignación de calificaciones para materia: {{ $course->curso }}</h3>
            <h5><strong>Grado:</strong> {{ $levelinfo->nameL }} &nbsp;<strong>Grupo:</strong> {{ $levelinfo->nameG }}</h5>
            <div class="card mt-4">
                <div class="card-body">
                    <h4 class="text-uppercase font-weight-bold mb-4">Primer periodo:</h4>
                    @if($permission1->status == 'Activo')
                    @if($periodo1->count()>0 and $permission1->status == 'Activo')
                    <table class="table table-striped text-center">
                        <thead>
                            <tr class="text-uppercase">
                                <th>Nombre</th>
                                @foreach($rubros as $rubro)
                                <th>{{ $rubro->rubro }}</th>
                                @endforeach
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($studentEval as $alumno)
                            <tr>
                                <td>{{ $alumno->nombre }}</td>

                                @foreach($rubros as $rubro)

                                <td>
                                    <form method="post" action="{{ route('admin.evaluations.actua.evaluacion') }}" class="form-registrar" autocomplete="off" id="my_form">
                                        @csrf
                                        <div class="form-group inline-block" style="display:none;">
                                            <input type="text" name="id_student[]" class="form-control" value="{{ $alumno->idEstudent }}">
                                        </div>
                                        <div class="form-group inline-block" style="display:none;">
                                            <input type="text" name="id_teacher" class="form-control" value="{{ $teachers = auth()->user()->id }}">
                                        </div>
                                        <div class="form-group inline-block" style="display:none;">
                                            <input type="text" name="id_course" class="form-control" value="{{ $course->id_course}}">
                                        </div>
                                        <div class="form-group inline-block" style="display:none;">
                                            <input type="text" name="id_cycle" class="form-control" value="{{ $cycle->id_cycle }}">
                                        </div>
                                        <div class="form-group inline-block" style="display:none;">
                                            <input type="text" name="id_rc[]" class="form-control" value="{{ $rubro->id_rc }}">
                                        </div>
                                        <div class="form-group inline-block" style="display:none;">
                                            <input type="text" name="id_period" class="form-control" value="1">
                                        </div>
                                        @foreach($calificaciones as $cal)
                                        @if($cal->id_student == $alumno->idEstudent and $cal->id_rc == $rubro->id_rc and $cal->id_period==1)
                                        <div class="form-group inline-block">
                                            <input type="text" name="value[]" class="form-control" value="{{ $cal->value }}" required>
                                        </div>
                                        <div class="form-group inline-block" style="display:none;">
                                            <input type="text" name="id_grade[]" class="form-control" value="{{ $cal->id_grade }}">
                                        </div>
                                        @endif
                                        @endforeach
                                </td>
                                @endforeach
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                    <button type="submit" class="btn btn-primary mt-3 text-uppercase">Actualizar Evaluación</button>
                    <a href="javascript:history.back();" class="btn btn-info mt-3 text-uppercase">Cancelar</a>
                    </form>
                    @else
                    <!----------- Seccion del primero para registrar------------>
                    <table class="table table-striped text-center">
                        <thead>
                            <tr class="text-uppercase">
                                <th>Nombre</th>
                                @foreach($rubros as $rubro)
                                <th>{{ $rubro->rubro }}</th>
                                @endforeach
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($studentEval as $alumno)
                            <tr>
                                <td>{{ $alumno->nombre }}</td>
                                @foreach($rubros as $rubro)
                                <td>
                                    <form method="post" action="{{ route('admin.evaluations.store') }}" class="form-registrar" autocomplete="off" id="my_form">
                                        @csrf
                                        <div class="form-group inline-block" style="display: none;">
                                            <input type="text" name="id_student[]" class="form-control" value="{{ $alumno->idEstudent }}">
                                        </div>
                                        <div class="form-group inline-block" style="display: none;">
                                            <input type="text" name="id_teacher" class="form-control" value="{{ $teachers = auth()->user()->id }}">
                                        </div>
                                        <div class="form-group inline-block" style="display: none;">
                                            <input type="text" name="id_course" class="form-control" value="{{ $course->id_course}}">
                                        </div>
                                        <div class="form-group inline-block" style="display: none;">
                                            <input type="text" name="id_cycle" class="form-control" value="{{ $cycle->id_cycle }}">
                                        </div>
                                        <div class="form-group inline-block" style="display: none;">
                                            <input type="text" name="id_rc[]" class="form-control" value="{{ $rubro->id_rc }}">
                                        </div>
                                        <div class="form-group inline-block" style="display: none;">
                                            <input type="text" name="id_period" class="form-control" value="1">
                                        </div>
                                        <div class="form-group inline-block">
                                            <input type="text" name="value[]" class="form-control" placeholder="Ingrese la calificación" required>
                                        </div>
                                </td>
                                @endforeach
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                    <button type="submit" class="btn btn-primary mt-3 text-uppercase">Registrar Evaluación</button>
                    <a href="javascript:history.back();" class="btn btn-info mt-3 text-uppercase">Cancelar</a>
                    </form>
                    @endif
                    @elseif($permission1->status == 'Suspendido')
                    <td><strong class="text-danger">El periodo de evaluación se encuentra cerrado.</strong></td>
                    @endif
                    @if(count($studentEval) <= 0) <tr>
                        <div class="card-body p-3">
                            <strong style="text-transform: uppercase; color: red;">No existen registros.</strong>
                        </div>
                        </tr>
                        @endif
                </div>
            </div>
            <!----------- Seccion del segundo------------>
            <div class="card mt-4">
                <div class="card-body">
                    <h4 class="text-uppercase font-weight-bold mb-4">Segundo periodo:</h4>
                    @if($permission2->status == 'Activo')
                    @if($periodo2->count()>0 and $permission2->status == 'Activo')
                    <table class="table table-striped text-center">
                        <thead>
                            <tr class="text-uppercase">
                                <th>Nombre</th>
                                @foreach($rubros as $rubro)
                                <th>{{ $rubro->rubro }}</th>
                                @endforeach
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($studentEval as $alumno)
                            <tr>
                                <td>{{ $alumno->nombre }}</td>

                                @foreach($rubros as $rubro)

                                <td>
                                    <form method="post" action="{{ route('admin.evaluations.actualizar') }}" class="form-registrar" autocomplete="off" id="my_form">
                                        @csrf
                                        <div class="form-group inline-block" style="display:none;">
                                            <input type="text" name="id_student[]" class="form-control" value="{{ $alumno->idEstudent }}">
                                        </div>
                                        <div class="form-group inline-block" style="display:none;">
                                            <input type="text" name="id_teacher" class="form-control" value="{{ $teachers = auth()->user()->id }}">
                                        </div>
                                        <div class="form-group inline-block" style="display:none;">
                                            <input type="text" name="id_course" class="form-control" value="{{ $course->id_course}}">
                                        </div>
                                        <div class="form-group inline-block" style="display:none;">
                                            <input type="text" name="id_cycle" class="form-control" value="{{ $cycle->id_cycle }}">
                                        </div>
                                        <div class="form-group inline-block" style="display:none;">
                                            <input type="text" name="id_rc[]" class="form-control" value="{{ $rubro->id_rc }}">
                                        </div>
                                        <div class="form-group inline-block" style="display:none;">
                                            <input type="text" name="id_period" class="form-control" value="2">
                                        </div>
                                        @foreach($calificaciones as $cal)
                                        @if($cal->id_student == $alumno->idEstudent and $cal->id_rc == $rubro->id_rc and $cal->id_period==2)
                                        <div class="form-group inline-block">
                                            <input type="text" name="value[]" class="form-control" value="{{ $cal->value }}" required>
                                        </div>
                                        @endif
                                        @endforeach
                                </td>
                                @endforeach
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                    <button type="submit" class="btn btn-primary mt-3 text-uppercase">Actualizar Evaluación</button>
                    <a href="javascript:history.back();" class="btn btn-info mt-3 text-uppercase">Cancelar</a>
                    </form>
                    @else
                    <!----------- Seccion del segundo para registrar------------>
                    <table class="table table-striped text-center">
                        <thead>
                            <tr class="text-uppercase">
                                <th>Nombre</th>
                                @foreach($rubros as $rubro)
                                <th>{{ $rubro->rubro }}</th>
                                @endforeach
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($studentEval as $alumno)
                            <tr>
                                <td>{{ $alumno->nombre }}</td>
                                @foreach($rubros as $rubro)
                                <td>
                                    <form method="post" action="{{ route('admin.evaluations.store') }}" class="form-registrar" autocomplete="off" id="my_form">
                                        @csrf
                                        <div class="form-group inline-block" style="display: none;">
                                            <input type="text" name="id_student[]" class="form-control" value="{{ $alumno->idEstudent }}">
                                        </div>
                                        <div class="form-group inline-block" style="display: none;">
                                            <input type="text" name="id_teacher" class="form-control" value="{{ $teachers = auth()->user()->id }}">
                                        </div>
                                        <div class="form-group inline-block" style="display: none;">
                                            <input type="text" name="id_course" class="form-control" value="{{ $course->id_course}}">
                                        </div>
                                        <div class="form-group inline-block" style="display: none;">
                                            <input type="text" name="id_cycle" class="form-control" value="{{ $cycle->id_cycle }}">
                                        </div>
                                        <div class="form-group inline-block" style="display: none;">
                                            <input type="text" name="id_rc[]" class="form-control" value="{{ $rubro->id_rc }}">
                                        </div>
                                        <div class="form-group inline-block" style="display: none;">
                                            <input type="text" name="id_period" class="form-control" value="2">
                                        </div>
                                        <div class="form-group inline-block">
                                            <input type="text" name="value[]" class="form-control" placeholder="Ingrese la calificación" required>
                                        </div>
                                </td>
                                @endforeach
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                    <button type="submit" class="btn btn-primary mt-3 text-uppercase">Registrar Evaluación</button>
                    <a href="javascript:history.back();" class="btn btn-info mt-3 text-uppercase">Cancelar</a>
                    </form>
                    @endif
                    @elseif($permission1->status == 'Suspendido')
                    <td><strong class="text-danger">El periodo de evaluación se encuentra cerrado.</strong></td>
                    @endif
                    @if(count($studentEval) <= 0) <tr>
                        <div class="card-body p-3">
                            <strong style="text-transform: uppercase; color: red;">No existen registros.</strong>
                        </div>
                        </tr>
                        @endif
                </div>
            </div>
            <!-- Seccion del tercer periodo-->
            <div class="card mt-4">
                <div class="card-body">
                    <h4 class="text-uppercase font-weight-bold mb-4">Tercer periodo:</h4>
                    @if($permission3->status == 'Activo')
                    @if($periodo3->count()>0 and $permission3->status == 'Activo')
                    <table class="table table-striped text-center">
                        <thead>
                            <tr class="text-uppercase">
                                <th>Nombre</th>
                                @foreach($rubros as $rubro)
                                <th>{{ $rubro->rubro }}</th>
                                @endforeach
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($studentEval as $alumno)
                            <tr>
                                <td>{{ $alumno->nombre }}</td>

                                @foreach($rubros as $rubro)

                                <td>
                                    <form method="post" action="{{ route('admin.evaluations.actualizar') }}" class="form-registrar" autocomplete="off" id="my_form">
                                        @csrf
                                        <div class="form-group inline-block" style="display:none;">
                                            <input type="text" name="id_student[]" class="form-control" value="{{ $alumno->idEstudent }}">
                                        </div>
                                        <div class="form-group inline-block" style="display:none;">
                                            <input type="text" name="id_teacher" class="form-control" value="{{ $teachers = auth()->user()->id }}">
                                        </div>
                                        <div class="form-group inline-block" style="display:none;">
                                            <input type="text" name="id_course" class="form-control" value="{{ $course->id_course}}">
                                        </div>
                                        <div class="form-group inline-block" style="display:none;">
                                            <input type="text" name="id_cycle" class="form-control" value="{{ $cycle->id_cycle }}">
                                        </div>
                                        <div class="form-group inline-block" style="display:none;">
                                            <input type="text" name="id_rc[]" class="form-control" value="{{ $rubro->id_rc }}">
                                        </div>
                                        <div class="form-group inline-block" style="display:none;">
                                            <input type="text" name="id_period" class="form-control" value="3">
                                        </div>
                                        @foreach($calificaciones as $cal)
                                        @if($cal->id_student == $alumno->idEstudent and $cal->id_rc == $rubro->id_rc and $cal->id_period==3)
                                        <div class="form-group inline-block">
                                            <input type="text" name="value[]" class="form-control" value="{{ $cal->value }}" required>
                                        </div>
                                        @endif
                                        @endforeach
                                </td>
                                @endforeach
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                    <button type="submit" class="btn btn-primary mt-3 text-uppercase">Actualizar Evaluación</button>
                    <a href="javascript:history.back();" class="btn btn-info mt-3 text-uppercase">Cancelar</a>
                    </form>
                    @else
                    <!----------- Seccion del tercero para registrar------------>
                    <table class="table table-striped text-center">
                        <thead>
                            <tr class="text-uppercase">
                                <th>Nombre</th>
                                @foreach($rubros as $rubro)
                                <th>{{ $rubro->rubro }}</th>
                                @endforeach
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($studentEval as $alumno)
                            <tr>
                                <td>{{ $alumno->nombre }}</td>
                                @foreach($rubros as $rubro)
                                <td>
                                    <form method="post" action="{{ route('admin.evaluations.store') }}" class="form-registrar" autocomplete="off" id="my_form">
                                        @csrf
                                        <div class="form-group inline-block" style="display: none;">
                                            <input type="text" name="id_student[]" class="form-control" value="{{ $alumno->idEstudent }}">
                                        </div>
                                        <div class="form-group inline-block" style="display: none;">
                                            <input type="text" name="id_teacher" class="form-control" value="{{ $teachers = auth()->user()->id }}">
                                        </div>
                                        <div class="form-group inline-block" style="display: none;">
                                            <input type="text" name="id_course" class="form-control" value="{{ $course->id_course}}">
                                        </div>
                                        <div class="form-group inline-block" style="display: none;">
                                            <input type="text" name="id_cycle" class="form-control" value="{{ $cycle->id_cycle }}">
                                        </div>
                                        <div class="form-group inline-block" style="display: none;">
                                            <input type="text" name="id_rc[]" class="form-control" value="{{ $rubro->id_rc }}">
                                        </div>
                                        <div class="form-group inline-block" style="display: none;">
                                            <input type="text" name="id_period" class="form-control" value="3">
                                        </div>
                                        <div class="form-group inline-block">
                                            <input type="text" name="value[]" class="form-control" placeholder="Ingrese la calificación" required>
                                        </div>
                                </td>
                                @endforeach
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                    <button type="submit" class="btn btn-primary mt-3 text-uppercase">Registrar Evaluación</button>
                    <a href="javascript:history.back();" class="btn btn-info mt-3 text-uppercase">Cancelar</a>
                    </form>
                    @endif
                    @elseif($permission1->status == 'Suspendido')
                    <td><strong class="text-danger">El periodo de evaluación se encuentra cerrado.</strong></td>
                    @endif
                    @if(count($studentEval) <= 0) <tr>
                        <div class="card-body p-3">
                            <strong style="text-transform: uppercase; color: red;">No existen registros.</strong>
                        </div>
                        </tr>
                        @endif
                </div>
            </div>
            <!--Cierre de seccion-->
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