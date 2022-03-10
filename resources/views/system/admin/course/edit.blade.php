@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
@stop

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card mt-4">
                    <div class="card-body">
                        <h3>Datos de la materia: <strong>{{ $course->name }}</strong></h3>
                        <form method="post" action="{{ route('admin.course.update', $course->id_course) }}"
                            class="form-registrar" autocomplete="off">
                            @method('put')
                            @csrf
                            <div class="row">
                                <div class="col-4">
                                    <label>Nombre de la materia: (boleta)</label>
                                    <input name="name" type="text" class="form-control" value="{{ $course->name }}"
                                        maxlength="50">
                                </div>
                                <div class="col-4">
                                    <label>Nombre de la materia:</label>
                                    <input name="nickname" type="text" class="form-control"
                                        value="{{ $course->nickname }}" maxlength="50">
                                </div>
                                <div class="col-4">
                                    <label>¿Reporta calificación a la SEP?</label>
                                    <select class="form-control" name="rep_sep" required>
                                        @if ($course->rep_sep == 1)
                                            <option selected value="{{ $course->rep_sep }}">Si</option>
                                            <option value="2">No</option>
                                        @elseif($course->rep_sep == 0)
                                            <option value="{{ $course->rep_sep }}">No</option>
                                            <option value="1">Si</option>
                                        @endif
                                    </select>
                                </div>
                                <div class="col">
                                    <label>Nombre SEP:</label>
                                    <input name="nick_sep" type="text" class="form-control"
                                        value="{{ $course->nick_sep }}" maxlength="50">
                                </div>

                                <div class="col">
                                    <label>Ciclo escolar:</label>
                                    <input name="cycle" type="text" class="form-control" value="{{ $course->cycle }}"
                                        maxlength="20" required>
                                </div>
                                <div class="col">
                                    <label>Fecha de creación:</label>
                                    <input name="creado" type="text" class="form-control"
                                        value="{{ $course->created_at->format('d/m/Y') }}" readonly>
                                </div>
                                <div class="col">
                                    <label>Fecha de actualización:</label>
                                    <input name="actualizado" type="text" class="form-control"
                                        value="{{ $course->updated_at->format('d/m/Y') }}" readonly>
                                </div>
                            </div>
                            <button type="submit" class="btn btn-primary mt-3 text-uppercase">Actualizar</button>
                            <a href="javascript:history.back();" class="btn btn-info mt-3 text-uppercase">Cancelar</a>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="container-fluid mb-3">
        <div class="row">
            <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
                <div class="card collapsed-card">
                    <div class="card-header">
                        <h3 class="card-title text-uppercase">Registrar rubro de evaluación</h3>
                        <div class="card-tools">
                            <button type="button" class="btn btn-tool" data-card-widget="collapse"><i
                                    class="fas fa-plus"></i>
                            </button>
                        </div>
                    </div>
                    <div class="card-body">
                        <form method="post" action="{{ route('admin.course.registro.rubro') }}"
                            class="form-registrar-rubro" autocomplete="off">
                            @csrf
                            <div class="row">
                                <div class="col-12 mb-2">
                                    <label>Nombre del rubro:</label>
                                    <input name="rubro" type="text" class="form-control"
                                        placeholder="Ingresar nombre del rubro" maxlength="100" required>
                                </div>
                                <div class="col-12 mb-2">
                                    <label>Porcentaje:</label>
                                    <input name="porcentaje" type="text" class="form-control"
                                        placeholder="Ingresar porcentaje (solo numero)" maxlength="3" pattern="[0-9]{10}"
                                        onKeypress="if (event.keyCode < 45 || event.keyCode > 57) event.returnValue = false;"
                                        required>
                                </div>
                                <div class="col-12 mb-2" style="display: none;">
                                    <label>id course</label>
                                    <input name="id_course" type="text" class="form-control"
                                        value="{{ $course->id_course }}" maxlength="20" readonly>
                                </div>
                            </div>
                            <button type="submit"
                                class="btn btn-outline-primary btn-block mt-3 text-uppercase">Registrar</button>
                            <button type="reset" class="btn btn-outline-danger btn-block mt-3 text-uppercase">Borrar
                                todo</button>
                        </form>
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
                        <h3 class="text-uppercase font-weight-bold mb-4">Listado de rubros asignados</h3>
                        <table class="table table-striped text-center">
                            <thead>
                                <tr class="text-uppercase">
                                    <th>Rubro</th>
                                    <th>Valor</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($rubros as $rubro)
                                    <tr>
                                        <td>{{ $rubro->rubro }}</td>
                                        <td>{{ $rubro->porcentaje }} %</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                        @if (count($rubros) <= 0)
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
    <script type="text/javascript">
        $('.form-registrar').submit(function(e) {
            e.preventDefault();
            Swal.fire({
                title: '¿Esta seguro de modificar?',
                showDenyButton: true,
                showCancelButton: true,
                confirmButtonText: 'Modificar',
                denyButtonText: `Cancelar`,
            }).then((result) => {
                /* Read more about isConfirmed, isDenied below */
                if (result.value) {
                    this.submit();
                }
            })
        });
    </script>
    @if (session('Registrar-rubro') == 'ok')
        {
        <script>
            Swal.fire('¡Rubro registrado!', '', 'success')
        </script>
        }
    @endif
@stop
