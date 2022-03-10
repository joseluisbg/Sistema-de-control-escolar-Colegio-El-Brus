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
                        <h2>Asignación de materias en academia</h2>
                        <form method="post" action="{{ route('admin.academia.materia') }}" class="form-registrar"
                            autocomplete="off" id="my_form">
                            @csrf
                            <table id="alumnos1" class="table table-striped">
                                <thead>
                                    <tr class="text-uppercase">
                                        <th>Listado de alumnos por asignar</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @if ($students->count())

                                        @foreach ($students as $student)
                                            <tr>
                                                <td>
                                                    <div class="form-check">
                                                        <input type="checkbox" name="id_academy"
                                                            value="{{ $student->idAcademy }}">
                                                        <input type="text" name="id_course[]"
                                                            value="{{ $student->idCourse }}" style="display: none">
                                                        <label class="form-check-label" for="exampleRadios1">
                                                            {{ $student->name }}
                                                        </label>
                                                    </div>
                                                </td>
                                            </tr>
                                        @endforeach
                                    @endif
                                </tbody>
                            </table>
                            <button type="submit" class="btn btn-primary btn-enviar" id="btn-enviar">Asignar</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>


@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.11.4/css/dataTables.bootstrap4.min.css">
@stop

@section('js')
    <script type="text/javascript" src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/1.11.4/js/jquery.dataTables.min.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/1.11.4/js/dataTables.bootstrap4.min.js"></script>

    <script type="text/javascript">
        $(document).ready(function() {
            $('#alumnos2').DataTable({
                'lengthMenu': [
                    [5, 10, 50. - 1],
                    [5, 10, 50, "Todos"]
                ],
                "language": {
                    "url": "//cdn.datatables.net/plug-ins/9dcbecd42ad/i18n/Spanish.json"
                }
            });
        });
    </script>

    <script type="text/javascript">
        $('.form-suspender').submit(function(e) {
            e.preventDefault();
            Swal.fire({
                title: '¿Desea suspender al grupo?',
                showDenyButton: true,
                showCancelButton: true,
                confirmButtonText: 'Aceptar',
                denyButtonText: `Cancelar`,
            }).then((result) => {
                /* Read more about isConfirmed, isDenied below */
                if (result.value) {
                    this.submit();
                }
            })
        });
    </script>
    <script type="text/javascript">
        $('.form-registra').submit(function(e) {
            e.preventDefault();
            Swal.fire({
                title: '¿Desea asignar los alumnos al grupo?',
                showDenyButton: true,
                showCancelButton: true,
                confirmButtonText: 'Aceptar',
                denyButtonText: `Cancelar`,
            }).then((result) => {
                /* Read more about isConfirmed, isDenied below */
                if (result.value) {
                    this.submit();
                }
            })
        });
    </script>
@stop
