@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
@stop

@section('content')
<div class="container-fluid pt-3">
  <h3 class="text-uppercase">Control de grados</h3>
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
           <h3 class="card-title text-uppercase">Registrar grado</h3>
           <div class="card-tools">
             <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-plus"></i>
             </button>
           </div>
         </div>
          <div class="card-body">
            <form method="post" action="{{ route('admin.level.store') }}" class="form-registrar" autocomplete="off">
            @csrf
            <div class="row">
              <div class="col-12 mb-2">
                <label>Nombre del grado:</label>
                <input name="name" type="text" class="form-control" placeholder="Ingresar nombre del grado" maxlength="20" required>
              </div>
              <div class="col">
                <label>Nombre corto:</label>
                <input name="nickname" type="text" class="form-control" placeholder="Ingresar registro sep" maxlength="20" required>
              </div>
              <div class="col">
                <label>Nivel escolar:</label>
                <select class="form-control" name="id_area" required>
                  <option selected disabled value="">Seleccionar</option>
                  @foreach($areas as $area)
                  <option value="{{ $area->id_area }}">{{ $area->name }}</option>
                  @endforeach
                </select>
              </div>
              <div class="col">
                <label>Ciclo escolar:</label>
                <select class="form-control" name="cycle" required>
                  <option selected disabled value="">Seleccionar</option>
                  @foreach($cycles as $cycle)
                  <option value="{{ $cycle->name }}">{{ $cycle->name }}</option>
                  @endforeach
                </select>
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

@livewire('admin.level.level-index')

@stop

@section('css')
<link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
<script type="text/javascript">
  $('.form-suspender').submit(function(e){
    e.preventDefault();
    Swal.fire({
    title: '¿Desea suspender el grado?',
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
    title: '¿Desea activar el grado?',
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
    Swal.fire('¡Grado registrado!', '', 'success')
    </script>
  }
  @endif
  @if(session('Actualizar') == 'ok') {
    <script>
    Swal.fire('¡Grado actualizado!', '', 'success')
    </script>
  }
  @endif
  @if(session('Registrar-grupo') == 'ok') {
    <script>
    Swal.fire('¡Grado actualizado!', '', 'success')
    </script>
  }
  @endif
  @if(session('Suspendido') == 'ok') {
    <script>
    Swal.fire('¡Grado suspendido!', '', 'success')
    </script>
  }
  @endif
  @if(session('Activo') == 'ok') {
    <script>
    Swal.fire('¡Grado activo!', '', 'success')
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