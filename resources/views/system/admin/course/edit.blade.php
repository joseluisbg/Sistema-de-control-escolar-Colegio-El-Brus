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
          <h3>Datos de la materia: <strong>{{ $course->name}}</strong></h3>
          <form method="post" action="{{ route('admin.course.update',$course->id_course) }}" class="form-registrar" autocomplete="off">
          @method('put')
          @csrf
          <div class="row">
              <div class="col-4">
                <label>Nombre de la materia: (boleta)</label>
                <input name="name" type="text" class="form-control" value="{{ $course->name }}" maxlength="50">
              </div>
              <div class="col-4">
                <label>Nombre de la materia:</label>
                <input name="nickname" type="text" class="form-control" value="{{ $course->nickname }}" maxlength="50">
              </div>
              <div class="col-4">
              <label>¿Reporta calificación a la SEP?</label>
                <select class="form-control" name="rep_sep" required>
                  @if($course->rep_sep == 1)
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
                <input name="nick_sep" type="text" class="form-control" value="{{ $course->nick_sep }}" maxlength="50">
              </div>
              
              <div class="col">
                <label>Ciclo escolar:</label>
                <input name="cycle" type="text" class="form-control" value="{{ $course->cycle }}" maxlength="20" required>
              </div>
              <div class="col">
                <label>Fecha de creación:</label>
                <input name="creado" type="text" class="form-control" value="{{ $course->created_at->format('d/m/Y') }}" readonly>
              </div>
              <div class="col">
                <label>Fecha de actualización:</label>
                <input name="actualizado" type="text" class="form-control" value="{{ $course->updated_at->format('d/m/Y') }}" readonly>
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
</div>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
<script type="text/javascript">
  $('.form-registrar').submit(function(e){
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
@stop