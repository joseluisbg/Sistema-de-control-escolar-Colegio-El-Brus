@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
@stop

@section('content')

<div class="card mb-5" >
        <div class="card-body" style="margin-top: 10px;">
          <h4 class="text-uppercase font-weight-bold mb-5">Contro del acceso a evaluaciones</h4>
            <table class="table table-striped text-center">
                <thead>
                    <tr class="text-uppercase">
                        <th>Nombre periodo</th>
                        <th>Estatus</th>
                    </tr>
                </thead>
                <tbody>
                  @foreach($periodos as $periodo)
                    <tr>
                        <td>{{ $periodo->name }}</td>
                        <td>
                          @if($periodo->status == 'Activo')
                            <form method="post" action="{{ route('permissions.status.suspendido', $periodo->id_permission) }}" class="form-suspender">
                                @csrf
                                @method('put')
                                <button type="submit" class="btn text-success">
                                    <span>Activo</span>
                                </button>
                            </form>
                            @elseif($periodo->status == 'Suspendido')
                            <form method="post" action="{{ route('permissions.status.activo', $periodo->id_permission) }}" class="form-activar">
                                @csrf
                                @method('put')
                                <button type="submit" class="btn text-danger">
                                    <span>Suspendido</span>
                                </button>
                            </form>
                            @endif
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

@stop

@section('css')
<link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
<script type="text/javascript">
  $('.form-suspender').submit(function(e){
    e.preventDefault();
    Swal.fire({
    title: '¿Desea suspender el periodo?',
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
    title: '¿Desea activar el periodo?',
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
@if(session('Registrar') == 'ok') {
    <script>
    Swal.fire('¡Periodo registrado!', '', 'success')
    </script>
  }
  @endif
  @if(session('Actualizar') == 'ok') {
    <script>
    Swal.fire('¡Periodo actualizado!', '', 'success')
    </script>
  }
  @endif
  @if(session('Registrar-grupo') == 'ok') {
    <script>
    Swal.fire('¡Periodo actualizado!', '', 'success')
    </script>
  }
  @endif
  @if(session('Suspendido') == 'ok') {
    <script>
    Swal.fire('¡Periodo suspendido!', '', 'success')
    </script>
  }
  @endif
  @if(session('Activo') == 'ok') {
    <script>
    Swal.fire('¡Periodo activo!', '', 'success')
    </script>
  }
  @endif
  @if(session('grupo-suspendido') == 'ok') {
    <script>
    Swal.fire('¡Grupo suspendido!', '', 'success')
    </script>
  }
  @endif
  @if(session('grupo-activo') == 'ok') {
    <script>
    Swal.fire('¡Grupo activado!', '', 'success')
    </script>
  }
  @endif
  @if(session('grupo-registrado') == 'ok') {
    <script>
    Swal.fire('¡Grupo registrado!', '', 'success')
    </script>
  }
  @endif
  @if(session('grupo-actualizado') == 'ok') {
    <script>
    Swal.fire('¡Grupo actualizado!', '', 'success')
    </script>
  }
  @endif
@stop