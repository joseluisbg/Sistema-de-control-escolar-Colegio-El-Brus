@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
@stop

@section('content')
    <div class="pt-3 container-fluid">
        <h3 class="text-uppercase">Asignación de Tutor a Grupo</h3>
    </div>

    @livewire('admin.assignment.tutor-group-index')

@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script type="text/javascript">
        $('.form-suspender').submit(function(e) {
            e.preventDefault();
            Swal.fire({
                title: '¿Desea suspender al tutor?',
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
        $('.form-activar').submit(function(e) {
            e.preventDefault();
            Swal.fire({
                title: '¿Desea activar al tutor?',
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
    @if (session('Asignado') == 'ok')
        {
        <script>
            Swal.fire('¡Tutor asignado al grupo!', '', 'success')
        </script>
        }
    @endif
    @if (session('Existe') == 'ok')
        {
        <script>
            Swal.fire('¡El tutor fue asignado anteriormente al grupo!', '', 'success')
        </script>
        }
    @endif
    @if (session('Suspendido') == 'ok')
        {
        <script>
            Swal.fire('Tutor suspendido!', '', 'success')
        </script>
        }
    @endif
    @if (session('Activo') == 'ok')
        {
        <script>
            Swal.fire('¡Tutor activo!', '', 'success')
        </script>
        }
    @endif
@stop
