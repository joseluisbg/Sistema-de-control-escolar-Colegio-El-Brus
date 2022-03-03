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
            <div class="card mt-4 collapsed-card">
                <div class="card-header" >
                   <h2 class="card-title text-uppercase font-weight-bold mb-3">Primer periodo:</h2>
                   <div class="card-tools">
                     <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-plus"></i>
                     </button>
                   </div>
                 </div>
                <div class="card-body">
                    @if($permission1->status == 'Activo')
                    @if($periodo1->count()>0 and $permission1->status == 'Activo')
                    <!-- Seccion cuando se actualizan las calificaciones -->
                    <table class="table table-striped text-center">
                        <thead>
                            <tr class="text-uppercase">
                                <th>Nombre</th>
                                @foreach($rubros as $rubro)
                                <th>{{ $rubro->rubro }}</th>
                                @endforeach
                                <th>Promedio</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($studentEval as $alumno)
                            <tr id="row-promedy">
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
                                            <input type="text" name="value[]" class="form-control" id="row-data" value="{{ $cal->value }}" required>
                                        </div>
                                        <div class="form-group inline-block" style="display:none">
                                            <input type="text" name="id_grade[]" class="form-control" value="{{ $cal->id_grade }}">
                                        </div>
                                        @endif
                                        @endforeach
                                </td>
                                @endforeach
                                <td style="display: none">
                                    <div class="form-group inline-block">
                                        <input type="text" name="id_studentU[]" class="form-control" value="{{ $alumno->idEstudent }}">
                                    </div>
                                </td>
                                <td>
                                    @foreach($promedios as $prome)
                                        @if($prome->id_student == $alumno->idEstudent and $prome->id_period==1)
                                        <div class="form-group inline-block" style="display:none">
                                            <input type="text" name="id_average[]" class="form-control" value="{{ $prome->id_average }}">
                                        </div>
                                        @endif
                                        @endforeach
                                    <div class="form-group inline-block">
                                        <input type="text" name="promedio[]" id="row-result-promedy" class="form-control" value="" readonly>
                                    </div>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                    <button type="submit" class="btn btn-primary mt-3 text-uppercase">Actualizar Evaluación</button>
                    <a href="javascript:history.back();" class="btn btn-info mt-3 text-uppercase">Cancelar</a>
                    </form>
                    @else
                    <!----------- Seccion del primero para registrar calificaciones ------------>
                    <table class="table table-striped text-center">
                        <thead>
                            <tr class="text-uppercase">
                                <th>Nombre</th>
                                @foreach($rubros as $rubro)
                                <th>{{ $rubro->rubro }}</th>
                                @endforeach
                                <th>Promedio</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($studentEval as $alumno)
                            <tr id="row-promedy">
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
                                            <input type="text" name="value[]" id="row-data" class="form-control" placeholder="Ingrese la calificación" required >
                                        </div>
                                </td>
                                @endforeach
                                <td style="display: none">
                                    <div class="form-group inline-block">
                                        <input type="text" name="id_studentU[]" class="form-control" value="{{ $alumno->idEstudent }}">
                                    </div>
                                </td>
                                <td>
                                    <div class="form-group inline-block">
                                        <input type="text" name="promedio[]" id="row-result-promedy" class="form-control" value="" readonly>
                                    </div>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                    <button type="submit" class="btn btn-primary mt-3 text-uppercase">Registrar Evaluación</button>
                    <a href="javascript:history.back();" class="btn btn-info mt-3 text-uppercase">Cancelar</a>
                    </form>
                    @endif
                    @elseif($periodo1->count()<=0 and $permission1->status == 'Suspendido')
                    <strong style="text-transform: uppercase; color: red;">El periodo de evaluación se encuentra cerrado.</strong>
                    @elseif($periodo1->count()>0 and $permission1->status == 'Suspendido')
                    <!-- Seccion para mostrar las evaluaciones realizadas sin ninguna accion permitida -->
                    <table class="table table-striped text-center">
                        <strong style="text-transform: uppercase; color: green;">Periodo evaluado.</strong>
                        <thead>
                            <tr class="text-uppercase">
                                <th>Nombre</th>
                                @foreach($rubros as $rubro)
                                <th>{{ $rubro->rubro }}</th>
                                @endforeach
                                <th>Promedio</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($studentEval as $alumno)
                            <tr id="row-promedy">
                                <td>{{ $alumno->nombre }}</td>
                                @foreach($rubros as $rubro)
                                <td>
                                    <form method="post" class="form-registrar" autocomplete="off" id="my_form">
                                        @csrf
                                        <div class="form-group inline-block" style="display:none;">
                                            <input type="text" name="id_student[]" class="form-control" value="{{ $alumno->idEstudent }}" readonly>
                                        </div>
                                        <div class="form-group inline-block" style="display:none;">
                                            <input type="text" name="id_teacher" class="form-control" value="{{ $teachers = auth()->user()->id }}" readonly>
                                        </div>
                                        <div class="form-group inline-block" style="display:none;">
                                            <input type="text" name="id_course" class="form-control" value="{{ $course->id_course}}" readonly>
                                        </div>
                                        <div class="form-group inline-block" style="display:none;">
                                            <input type="text" name="id_cycle" class="form-control" value="{{ $cycle->id_cycle }}" readonly>
                                        </div>
                                        <div class="form-group inline-block" style="display:none;">
                                            <input type="text" name="id_rc[]" class="form-control" value="{{ $rubro->id_rc }}" readonly>
                                        </div>
                                        <div class="form-group inline-block" style="display:none;">
                                            <input type="text" name="id_period" class="form-control" value="1" readonly>
                                        </div>
                                        @foreach($calificaciones as $cal)
                                        @if($cal->id_student == $alumno->idEstudent and $cal->id_rc == $rubro->id_rc and $cal->id_period==1)
                                        <div class="form-group inline-block">
                                            <input type="text" name="value[]" id="row-data" class="form-control" value="{{ $cal->value }}" readonly>
                                        </div>
                                        <div class="form-group inline-block" style="display:none;">
                                            <input type="text" name="id_grade[]" class="form-control" value="{{ $cal->id_grade }}" readonly>
                                        </div>
                                        @endif
                                        @endforeach
                                </td>
                                @endforeach
                                <td>
                                    <div class="form-group inline-block">
                                        <input type="text" name="promedio[]" id="row-result-promedy" class="form-control" value="" readonly>
                                    </div>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                    </form>
                    @endif
                    @if(count($studentEval) <= 0)
                    <tr>
                        <div class="card-body p-3">
                            <strong style="text-transform: uppercase; color: red;">No existen registros.</strong>
                        </div>
                    </tr>
                    @endif
                </div>
            </div>
            <!---- Seccion del segundo periodo----->
            <div class="card mt-4 collapsed-card">
                <div class="card-header" >
                   <h2 class="card-title text-uppercase font-weight-bold mb-3">Segundo periodo:</h2>
                   <div class="card-tools">
                     <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-plus"></i>
                     </button>
                   </div>
                 </div>
                <div class="card-body">
                    @if($permission2->status == 'Activo')
                    @if($periodo2->count()>0 and $permission2->status == 'Activo')
                    <!-- Seccion cuando se actualizan las calificaciones -->
                    <table class="table table-striped text-center">
                        <thead>
                            <tr class="text-uppercase">
                                <th>Nombre</th>
                                @foreach($rubros as $rubro)
                                <th>{{ $rubro->rubro }}</th>
                                @endforeach
                                <th>Promedio</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($studentEval as $alumno)
                            <tr id="row-promedy">
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
                                            <input type="text" name="id_period" class="form-control" value="2">
                                        </div>
                                        @foreach($calificaciones as $cal)
                                        @if($cal->id_student == $alumno->idEstudent and $cal->id_rc == $rubro->id_rc and $cal->id_period==2)
                                        <div class="form-group inline-block">
                                            <input type="text" name="value[]" class="form-control" id="row-data" value="{{ $cal->value }}" required>
                                        </div>
                                        <div class="form-group inline-block" style="display:none">
                                            <input type="text" name="id_grade[]" class="form-control" value="{{ $cal->id_grade }}">
                                        </div>
                                        @endif
                                        @endforeach
                                </td>
                                @endforeach
                                <td style="display: none">
                                    <div class="form-group inline-block">
                                        <input type="text" name="id_studentU[]" class="form-control" value="{{ $alumno->idEstudent }}">
                                    </div>
                                </td>
                                <td>
                                    @foreach($promedios as $prome)
                                        @if($prome->id_student == $alumno->idEstudent and $prome->id_period==2)
                                        <div class="form-group inline-block" style="display:none">
                                            <input type="text" name="id_average[]" class="form-control" value="{{ $prome->id_average }}">
                                        </div>
                                        @endif
                                        @endforeach
                                    <div class="form-group inline-block">
                                        <input type="text" name="promedio[]" id="row-result-promedy" class="form-control" value="" readonly>
                                    </div>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                    <button type="submit" class="btn btn-primary mt-3 text-uppercase">Actualizar Evaluación</button>
                    <a href="javascript:history.back();" class="btn btn-info mt-3 text-uppercase">Cancelar</a>
                    </form>
                    @else
                    <!----------- Seccion del segundo periodo para registrar calificaciones ------------>
                    <table class="table table-striped text-center">
                        <thead>
                            <tr class="text-uppercase">
                                <th>Nombre</th>
                                @foreach($rubros as $rubro)
                                <th>{{ $rubro->rubro }}</th>
                                @endforeach
                                <th>Promedio</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($studentEval as $alumno)
                            <tr id="row-promedy">
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
                                            <input type="text" name="value[]" id="row-data" class="form-control" placeholder="Ingrese la calificación" required >
                                        </div>
                                </td>
                                @endforeach
                                <td style="display: none">
                                    <div class="form-group inline-block">
                                        <input type="text" name="id_studentU[]" class="form-control" value="{{ $alumno->idEstudent }}">
                                    </div>
                                </td>
                                <td>
                                    <div class="form-group inline-block">
                                        <input type="text" name="promedio[]" id="row-result-promedy" class="form-control" value="" readonly>
                                    </div>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                    <button type="submit" class="btn btn-primary mt-3 text-uppercase">Registrar Evaluación</button>
                    <a href="javascript:history.back();" class="btn btn-info mt-3 text-uppercase">Cancelar</a>
                    </form>
                    @endif
                    @elseif($periodo2->count()<=0 and $permission2->status == 'Suspendido')
                    <strong style="text-transform: uppercase; color: red;">El periodo de evaluación se encuentra cerrado.</strong>
                    @elseif($periodo2->count()>0 and $permission2->status == 'Suspendido')
                    <!-- Seccion para mostrar las evaluaciones realizadas sin ninguna accion permitida -->
                    <table class="table table-striped text-center">
                        <strong style="text-transform: uppercase; color: green;">Periodo evaluado.</strong>
                        <thead>
                            <tr class="text-uppercase">
                                <th>Nombre</th>
                                @foreach($rubros as $rubro)
                                <th>{{ $rubro->rubro }}</th>
                                @endforeach
                                <th>Promedio</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($studentEval as $alumno)
                            <tr id="row-promedy">
                                <td>{{ $alumno->nombre }}</td>
                                @foreach($rubros as $rubro)
                                <td>
                                    <form method="post" class="form-registrar" autocomplete="off" id="my_form">
                                        @csrf
                                        <div class="form-group inline-block" style="display:none;">
                                            <input type="text" name="id_student[]" class="form-control" value="{{ $alumno->idEstudent }}" readonly>
                                        </div>
                                        <div class="form-group inline-block" style="display:none;">
                                            <input type="text" name="id_teacher" class="form-control" value="{{ $teachers = auth()->user()->id }}" readonly>
                                        </div>
                                        <div class="form-group inline-block" style="display:none;">
                                            <input type="text" name="id_course" class="form-control" value="{{ $course->id_course}}" readonly>
                                        </div>
                                        <div class="form-group inline-block" style="display:none;">
                                            <input type="text" name="id_cycle" class="form-control" value="{{ $cycle->id_cycle }}" readonly>
                                        </div>
                                        <div class="form-group inline-block" style="display:none;">
                                            <input type="text" name="id_rc[]" class="form-control" value="{{ $rubro->id_rc }}" readonly>
                                        </div>
                                        <div class="form-group inline-block" style="display:none;">
                                            <input type="text" name="id_period" class="form-control" value="2" readonly>
                                        </div>
                                        @foreach($calificaciones as $cal)
                                        @if($cal->id_student == $alumno->idEstudent and $cal->id_rc == $rubro->id_rc and $cal->id_period==2)
                                        <div class="form-group inline-block">
                                            <input type="text" name="value[]" id="row-data" class="form-control" value="{{ $cal->value }}" readonly>
                                        </div>
                                        <div class="form-group inline-block" style="display:none;">
                                            <input type="text" name="id_grade[]" class="form-control" value="{{ $cal->id_grade }}" readonly>
                                        </div>
                                        @endif
                                        @endforeach
                                </td>
                                @endforeach
                                <td>
                                    <div class="form-group inline-block">
                                        <input type="text" name="promedio[]" id="row-result-promedy" class="form-control" value="" readonly>
                                    </div>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                    </form>
                    @endif
                    @if(count($studentEval) <= 0)
                    <tr>
                        <div class="card-body p-3">
                            <strong style="text-transform: uppercase; color: red;">No existen registros.</strong>
                        </div>
                    </tr>
                    @endif
                </div>
            </div>
            <!--- Seccion para el tercer periodo de evaluacion ----->
            <div class="card mt-4 collapsed-card">
                <div class="card-header" >
                   <h2 class="card-title text-uppercase font-weight-bold mb-3">Tercer periodo:</h2>
                   <div class="card-tools">
                     <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-plus"></i>
                     </button>
                   </div>
                 </div>
                <div class="card-body">
                    @if($permission3->status == 'Activo')
                    @if($periodo3->count()>0 and $permission3->status == 'Activo')
                    <!-- Seccion cuando se actualizan las calificaciones -->
                    <table class="table table-striped text-center">
                        <thead>
                            <tr class="text-uppercase">
                                <th>Nombre</th>
                                @foreach($rubros as $rubro)
                                <th>{{ $rubro->rubro }}</th>
                                @endforeach
                                <th>Promedio</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($studentEval as $alumno)
                            <tr id="row-promedy">
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
                                            <input type="text" name="id_period" class="form-control" value="3">
                                        </div>
                                        @foreach($calificaciones as $cal)
                                        @if($cal->id_student == $alumno->idEstudent and $cal->id_rc == $rubro->id_rc and $cal->id_period==3)
                                        <div class="form-group inline-block">
                                            <input type="text" name="value[]" class="form-control" id="row-data" value="{{ $cal->value }}" required>
                                        </div>
                                        <div class="form-group inline-block" style="display:none">
                                            <input type="text" name="id_grade[]" class="form-control" value="{{ $cal->id_grade }}">
                                        </div>
                                        @endif
                                        @endforeach
                                </td>
                                @endforeach
                                <td style="display: none">
                                    <div class="form-group inline-block">
                                        <input type="text" name="id_studentU[]" class="form-control" value="{{ $alumno->idEstudent }}">
                                    </div>
                                </td>
                                <td>
                                    @foreach($promedios as $prome)
                                        @if($prome->id_student == $alumno->idEstudent and $prome->id_period==3)
                                        <div class="form-group inline-block" style="display:none">
                                            <input type="text" name="id_average[]" class="form-control" value="{{ $prome->id_average }}">
                                        </div>
                                        @endif
                                        @endforeach
                                    <div class="form-group inline-block">
                                        <input type="text" name="promedio[]" id="row-result-promedy" class="form-control" value="" readonly>
                                    </div>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                    <button type="submit" class="btn btn-primary mt-3 text-uppercase">Actualizar Evaluación</button>
                    <a href="javascript:history.back();" class="btn btn-info mt-3 text-uppercase">Cancelar</a>
                    </form>
                    @else
                    <!----------- Seccion del primero para registrar calificaciones ------------>
                    <table class="table table-striped text-center">
                        <thead>
                            <tr class="text-uppercase">
                                <th>Nombre</th>
                                @foreach($rubros as $rubro)
                                <th>{{ $rubro->rubro }}</th>
                                @endforeach
                                <th>Promedio</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($studentEval as $alumno)
                            <tr id="row-promedy">
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
                                            <input type="text" name="value[]" id="row-data" class="form-control" placeholder="Ingrese la calificación" required >
                                        </div>
                                </td>
                                @endforeach
                                <td style="display: none">
                                    <div class="form-group inline-block">
                                        <input type="text" name="id_studentU[]" class="form-control" value="{{ $alumno->idEstudent }}">
                                    </div>
                                </td>
                                <td>
                                    <div class="form-group inline-block">
                                        <input type="text" name="promedio[]" id="row-result-promedy" class="form-control" value="" readonly>
                                    </div>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                    <button type="submit" class="btn btn-primary mt-3 text-uppercase">Registrar Evaluación</button>
                    <a href="javascript:history.back();" class="btn btn-info mt-3 text-uppercase">Cancelar</a>
                    </form>
                    @endif
                    @elseif($periodo3->count()<=0 and $permission3->status == 'Suspendido')
                    <strong style="text-transform: uppercase; color: red;">El periodo de evaluación se encuentra cerrado.</strong>
                    @elseif($periodo3->count()>0 and $permission3->status == 'Suspendido')
                    <!-- Seccion para mostrar las evaluaciones realizadas sin ninguna accion permitida -->
                    <table class="table table-striped text-center">
                        <strong style="text-transform: uppercase; color: green;">Periodo evaluado.</strong>
                        <thead>
                            <tr class="text-uppercase">
                                <th>Nombre</th>
                                @foreach($rubros as $rubro)
                                <th>{{ $rubro->rubro }}</th>
                                @endforeach
                                <th>Promedio</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($studentEval as $alumno)
                            <tr id="row-promedy">
                                <td>{{ $alumno->nombre }}</td>
                                @foreach($rubros as $rubro)
                                <td>
                                    <form method="post" class="form-registrar" autocomplete="off" id="my_form">
                                        @csrf
                                        <div class="form-group inline-block" style="display:none;">
                                            <input type="text" name="id_student[]" class="form-control" value="{{ $alumno->idEstudent }}" readonly>
                                        </div>
                                        <div class="form-group inline-block" style="display:none;">
                                            <input type="text" name="id_teacher" class="form-control" value="{{ $teachers = auth()->user()->id }}" readonly>
                                        </div>
                                        <div class="form-group inline-block" style="display:none;">
                                            <input type="text" name="id_course" class="form-control" value="{{ $course->id_course}}" readonly>
                                        </div>
                                        <div class="form-group inline-block" style="display:none;">
                                            <input type="text" name="id_cycle" class="form-control" value="{{ $cycle->id_cycle }}" readonly>
                                        </div>
                                        <div class="form-group inline-block" style="display:none;">
                                            <input type="text" name="id_rc[]" class="form-control" value="{{ $rubro->id_rc }}" readonly>
                                        </div>
                                        <div class="form-group inline-block" style="display:none;">
                                            <input type="text" name="id_period" class="form-control" value="3" readonly>
                                        </div>
                                        @foreach($calificaciones as $cal)
                                        @if($cal->id_student == $alumno->idEstudent and $cal->id_rc == $rubro->id_rc and $cal->id_period==3)
                                        <div class="form-group inline-block">
                                            <input type="text" name="value[]" id="row-data" class="form-control" value="{{ $cal->value }}" readonly>
                                        </div>
                                        <div class="form-group inline-block" style="display:none;">
                                            <input type="text" name="id_grade[]" class="form-control" value="{{ $cal->id_grade }}" readonly>
                                        </div>
                                        @endif
                                        @endforeach
                                </td>
                                @endforeach
                                <td>
                                    <div class="form-group inline-block">
                                        <input type="text" name="promedio[]" id="row-result-promedy" class="form-control" value="" readonly>
                                    </div>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                    </form>
                    @endif
                    @if(count($studentEval) <= 0)
                    <tr>
                        <div class="card-body p-3">
                            <strong style="text-transform: uppercase; color: red;">No existen registros.</strong>
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
<!--- Script para calcular el promedio de cada alumno--->
<script>
    const rows = document.querySelectorAll('#row-promedy');

    const promedy = (valores = []) => {
      let valor = 0

      for(let i = 0; i < valores.length; i++) {
        valor += valores[i]
      }

      return parseFloat(valor / valores.length).toFixed(1)
    }

    rows.forEach(row => {
      const inputs = row.querySelectorAll('#row-data')
      const inputResult = row.querySelector('#row-result-promedy')
      let numbers = [];

      for(let i = 0; i < inputs.length; i++) {
        numbers.push(parseFloat(inputs[i].value))
      }

      const total = promedy(numbers)
      inputResult.value = total;

      inputs.forEach(input => {
        input.addEventListener('change', () => {
          let numbers = [];

          for(let i = 0; i < inputs.length; i++) {
            numbers.push(parseFloat(inputs[i].value))
          }

          const total = promedy(numbers)

          inputResult.value = total;
        })
      })
    })
</script>
@stop