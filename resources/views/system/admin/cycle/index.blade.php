@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
@stop

@section('content')
<div class="container-fluid pt-3">
  <h3 class="text-uppercase">Control de ciclos</h3>
  <div class="row p-4 justify-content-center">
    <div class="col-xs-12 col-sm-6 col-md-3 col-lg-3 col-offset-3">
      <div class="small-box bg-success shadow">
        <div class="inner">
          <h3>{{ $activos }}</h3>
          <p>Activos</p>
        </div>
        <div class="icon">
          <i class="fas fa-check-circle"></i>
        </div>
      </div>
    </div>
    <div class="col-xs-12 col-sm-6 col-md-3 col-lg-3 col-offset-3">
      <div class="small-box bg-info shadow">
        <div class="inner">
          <h3>{{ $suspendidos }}</h3>
          <p>Suspendidos</p>
        </div>
        <div class="icon">
          <i class="fas fa-hand-paper"></i>
        </div>
      </div>
    </div>
  </div>
</div>
<div class="container-fluid mb-3">
  <div class="row">
    <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
      <div class="card collapsed-card">
         <div class="card-header" >
           <h3 class="card-title text-uppercase">Registrar ciclo</h3>
           <div class="card-tools">
             <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-plus"></i>
             </button>
           </div>
         </div>
          <div class="card-body">
            <form method="post" action="{{ route('admin.cycle.store') }}" class="form-registrar" autocomplete="off">
            @csrf
            <div class="row">
              <div class="col">
                <label>Nombre del ciclo:</label>
                <input name="name" type="text" class="form-control" placeholder="Ingresar nombre del ciclo" maxlength="20" required>
              </div>
            </div>
            <button type="submit" class="btn btn-outline-primary btn-block mt-3 text-uppercase">Registrar</button>
            <button type="reset" class="btn btn-outline-danger btn-block mt-3 text-uppercase">Borrar todo</button>
          </form>
          </div>
      </div>
    </div>
  </div>
</div>

@livewire('admin.cycle.cycle-index')

@stop

@section('css')
<link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
<script type="text/javascript">
  $('.form-suspender').submit(function(e){
    e.preventDefault();
    Swal.fire({
    title: '¿Desea suspender el ciclo?',
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
    title: '¿Desea activar el ciclo?',
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
    Swal.fire('¡Ciclo registrado!', '', 'success')
    </script>
  }
  @endif
  @if(session('Actualizar') == 'ok') {
    <script>
    Swal.fire('¡Ciclo actualizado!', '', 'success')
    </script>
  }
  @endif
  @if(session('Suspendido') == 'ok') {
    <script>
    Swal.fire('¡Ciclo suspendido!', '', 'success')
    </script>
  }
  @endif
  @if(session('Activo') == 'ok') {
    <script>
    Swal.fire('¡Ciclo activo!', '', 'success')
    </script>
  }
  @endif
@stop