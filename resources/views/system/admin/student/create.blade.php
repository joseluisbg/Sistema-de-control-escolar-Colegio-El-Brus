@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
@stop

@section('content')
<div class="container-fluid pt-3">
  <div class="row">
    <div class="col-md-12">
      <div class="card">
        <div class="card-body">
          <h3 class="text-uppercase font-weight-bold mb-4">Crear un nuevo alumno</h3>
          <form method="post" action="{{ route('admin.student.store') }}" class="form-registrar" autocomplete="off">
            @csrf
            <div class="row">
              <div class="col">
                <label>Matricula:</label>
                <input name="matricula" type="text" class="form-control" placeholder="Ingrese la matricula" maxlength="50" required>
              </div>
              <div class="col">
                <label>Nombre:</label>
                <input name="name" type="text" class="form-control" placeholder="Ingrese el nombre" maxlength="50" required>
              </div>
              <div class="col">
                <label>CURP:</label>
                <input name="curp" id="curp" type="text" class="form-control text-uppercase" oninput="validarInput(this)" placeholder="Ingrese el curp" maxlength="18" minlength="18" required>
                <pre id="resultado" class="mt-1"></pre>
              </div>
            </div>
            <div class="row mt-4">
              <div class="col">
                <label>Calle:</label>
                <input name="street" type="text" class="form-control" placeholder="Ingrese la Calle">
              </div>
              <div class="col">
                <label>Colonia:</label>
                <input name="suburb" type="text" class="form-control" placeholder="Ingrese la colinia">
              </div>
              <div class="col">
                <label>Ciudad:</label>
                <input name="city" type="text" class="form-control" placeholder="Ingrese la Ciudad">
              </div>
            </div>
            <div class="row mt-4">
              <div class="col">
                <label>Estado:</label>
                <input name="state" type="text" class="form-control" placeholder="Ingrese el estado">
              </div>
              <div class="col">
                <label>Código Postal:</label>
                <input name="cp" type="text" class="form-control" placeholder="Ingrese el código postal" maxlength="8">
              </div>
              <div class="col">
                <label>Fecha de nacimiento:</label>
                <input name="date_ofbirth" type="date" class="form-control" placeholder="Ingrese la fecha de nacimiento" required>
              </div>
            </div>
            <div class="row mt-4">
              <h3 class="text-uppercase font-weight-bold mb-4">Datos del tutor principal</h3>
            </div>
            <div class="row mt-4">
              <div class="col">
                <label>Nombre:</label>
                <input name="name_principal" type="text" class="form-control" placeholder="Ingrese el estado" maxlength="50">
              </div>
              <div class="col">
                <label>Teléfono:</label>
                <input name="tel_1_principal" type="text" class="form-control" placeholder="Ingrese el código postal" maxlength="20">
              </div>
              <div class="col">
                <label>Celular:</label>
                <input name="tel_2_principal" type="text" class="form-control" placeholder="Ingrese la fecha de nacimiento" maxlength="20">
              </div>
            </div>
            <div class="row mt-4">
              <div class="col-4">
                <label>Email:</label>
                <input name="email_principal" type="email" class="form-control" placeholder="Ingrese el estado" maxlength="50">
              </div>
              <div class="col-4">
                <label>RFC:</label>
                <input name="rfc_principal" type="text" class="form-control" placeholder="Ingrese el código postal" maxlength="15">
              </div>
            </div>
            <div class="row mt-4">
              <h3 class="text-uppercase font-weight-bold mb-4">Datos del tutor secundario</h3>
            </div>
            <div class="row mt-4">
              <div class="col">
                <label>Nombre:</label>
                <input name="name_secundari" type="text" class="form-control" placeholder="Ingrese el estado" maxlength="50">
              </div>
              <div class="col">
                <label>Teléfono:</label>
                <input name="tel_1_secundari" type="text" class="form-control" placeholder="Ingrese el código postal" maxlength="20">
              </div>
              <div class="col">
                <label>Celular:</label>
                <input name="tel_2_secundari" type="text" class="form-control" placeholder="Ingrese la fecha de nacimiento" maxlength="20">
              </div>
            </div>
            <div class="row mt-4">
              <div class="col-4">
                <label>Email:</label>
                <input name="email_secundari" type="email" class="form-control" placeholder="Ingrese el estado" maxlength="50">
              </div>
            </div>
            <button type="submit" class="btn btn-primary mt-3 text-uppercase btn-registrar">Registrar</button>
            <button type="reset" class="btn btn-danger mt-3 text-uppercase">Borrar todo</button>
            <a href="javascript:history.back();" class="btn btn-info mt-3 text-uppercase">Cancelar</a>
          </form>
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
    title: '¿Desea realizar el registro?',
    showDenyButton: true,
    showCancelButton: true,
    confirmButtonText: 'Registrar',
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