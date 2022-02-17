@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
@stop

@section('content')
<div class="container-fluid pt-3">
  <h3 class="text-uppercase">Asignación de Materia a Grado</h3>
</div>

@livewire('admin.assignment.level-course-index')

@stop

@section('css')
<link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
<script type="text/javascript">
  $('.form-suspender').submit(function(e){
    e.preventDefault();
    Swal.fire({
    title: '¿Desea suspender la materia?',
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
  $('.form-activar').submit(function(e){
    e.preventDefault();
    Swal.fire({
    title: '¿Desea activar la materia?',
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
@if(session('Asignado') == 'ok') {
    <script>
    Swal.fire('¡Grupo asignado a materia!', '', 'success')
    </script>
  }
  @endif
  @if(session('Existe') == 'ok') {
    <script>
    Swal.fire('¡La materia fue asignado anteriormente al grupo!', '', 'success')
    </script>
  }
  @endif
  @if(session('Suspendido') == 'ok') {
    <script>
    Swal.fire('¡Materia suspendida!', '', 'success')
    </script>
  }
  @endif
  @if(session('Activo') == 'ok') {
    <script>
    Swal.fire('¡Materia activa!', '', 'success')
    </script>
  }
  @endif
@stop