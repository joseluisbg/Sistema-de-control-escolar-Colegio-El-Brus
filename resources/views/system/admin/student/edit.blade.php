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
          <h3 class="text-uppercase mb-4">Datos del alumno: <strong>{{ $student[0]->name }}&nbsp;</strong></h3>
          <form method="post" action="{{ route('admin.student.update',$student[0]->id_student) }}" class="form-registrar" autocomplete="off">
          @method('put')
          @csrf
          <div class="row">
              <div class="col">
                <label>Matricula:</label>
                <input name="matricula" type="text" class="form-control" value="{{ $student[0]->matricula }}" maxlength="50" required>
              </div>
              <div class="col">
                <label>Nombre:</label>
                <input name="name" type="text" class="form-control" value="{{ $student[0]->name }}" maxlength="50" required>
              </div>
              <div class="col">
                <label>CURP:</label>
                <input name="curp" id="curp" type="text" class="form-control text-uppercase" value="{{ $student[0]->curp }}" maxlength="18" minlength="18" required>
              </div>
            </div>
            <div class="row mt-4">
              <div class="col">
                <label>Calle:</label>
                <input name="street" type="text" class="form-control" value="{{ $student[0]->street }}">
              </div>
              <div class="col">
                <label>Colonia:</label>
                <input name="suburb" type="text" class="form-control" value="{{ $student[0]->suburb }}" maxlength="50">
              </div>
              <div class="col">
                <label>Ciudad:</label>
                <input name="city" type="text" class="form-control" value="{{ $student[0]->city }}" maxlength="50">
              </div>
            </div>
            <div class="row mt-4">
              <div class="col">
                <label>Estado:</label>
                <input name="state" type="text" class="form-control" value="{{ $student[0]->state }}" maxlength="50">
              </div>
              <div class="col">
                <label>Código Postal:</label>
                <input name="cp" type="text" class="form-control" value="{{ $student[0]->cp }}" maxlength="5">
              </div>
              <div class="col">
                <label>Fecha de nacimiento:</label>
                <input name="date_ofbirth" type="date" class="form-control" value="{{ $student[0]->date_ofbirth }}" required>
              </div>
            </div>
            <div class="row mt-4">
              <h3 class="text-uppercase font-weight-bold mb-4">Datos del tutor principal</h3>
            </div>
            <div class="row">
              <div class="col">
                <label>Nombre:</label>
                <input name="name_principal" type="text" class="form-control" value="{{ $student[0]->nombreTutor }}" maxlength="50">
              </div>
              <div class="col">
                <label>Teléfono:</label>
                <input name="tel_1_principal" type="text" class="form-control" value="{{ $student[0]->telefonoTutor }}" maxlength="20">
              </div>
              <div class="col">
                <label>Celular:</label>
                <input name="tel_2_principal" type="text" class="form-control" value="{{ $student[0]->celularTutor }}" maxlength="20">
              </div>
            </div>
            <div class="row mt-4">
              <div class="col-4">
                <label>Email:</label>
                <input name="email_principal" type="email" class="form-control" value="{{ $student[0]->correoTutor }}" maxlength="50">
              </div>
              <div class="col-4">
                <label>RFC:</label>
                <input name="rfc_principal" type="text" class="form-control" value="{{ $student[0]->rfcTutor }}" maxlength="15">
              </div>
              <div class="col-4" style="display: none;">
                <input name="prin_principal" type="text" class="form-control" value="{{ $student[0]->principalTutor }}">
              </div>
              <div class="col-4" style="display: none;">
                <input name="curp_principal" type="text" class="form-control" value="{{ $student[0]->curpTutor }}">
              </div>
            </div>
            <div class="row mt-4">
              <h3 class="text-uppercase font-weight-bold mb-4">Datos del tutor secundario</h3>
            </div>
            <div class="row">
              <div class="col">
                <label>Nombre:</label>
                <input name="name_secundari" type="text" class="form-control" value="{{ $student[1]->nombreTutor }}" maxlength="50">
              </div>
              <div class="col">
                <label>Teléfono:</label>
                <input name="tel_1_secundari" type="text" class="form-control" value="{{ $student[1]->telefonoTutor }}" maxlength="20">
              </div>
              <div class="col">
                <label>Celular:</label>
                <input name="tel_2_secundari" type="text" class="form-control" value="{{ $student[1]->celularTutor }}" maxlength="20">
              </div>
            </div>
            <div class="row mt-4">
              <div class="col-4">
                <label>Email:</label>
                <input name="email_secundari" type="email" class="form-control" value="{{ $student[1]->correoTutor }}" maxlength="50">
              </div>
              <div class="col-4" style="display: none;">
                <input name="prin_secundari" type="text" class="form-control" value="{{ $student[1]->principalTutor }}">
              </div>
              <div class="col-4" style="display: none;">
                <input name="curp_secundari"  type="text" class="form-control" value="{{ $student[1]->curpTutor }}">
              </div>
            </div>
            <button type="submit" class="btn btn-primary mt-3 text-uppercase">Actualizar</button>
            <button type="reset" class="btn btn-danger mt-3 text-uppercase">Borrar todo</button>
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
<script type="text/javascript">
  document.getElementById("curp").addEventListener('keyup', autoCompleteNew);

function autoCompleteNew(e) {
    var value = $(this).val();
    $("#curp_principal").val(value.replace(/\s/g, ' ').toUpperCase());
}
</script>
<script type="text/javascript">
  document.getElementById("curp").addEventListener('keyup', autoCompleteNew);

function autoCompleteNew(e) {
    var value = $(this).val();
    $("#curp_secundari").val(value.replace(/\s/g, ' ').toUpperCase());
}
</script>
@stop