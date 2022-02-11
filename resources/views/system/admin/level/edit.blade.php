@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
@stop

@section('content')
<?php
  use App\Models\Ce_group;
?>
<div class="container-fluid">
  <div class="row">
    <div class="col-md-12">
      <div class="card mt-4">
        <div class="card-body">
          <h3>Datos del grado: <strong>{{ $level->name}}</strong></h3>
          <form method="post" action="{{ route('admin.level.update',$level->id_level) }}" class="form-registrar" autocomplete="off">
          @method('put')
          @csrf
          <div class="row">
              <div class="col">
                <label>Nombre:</label>
                <input name="name" type="text" class="form-control" value="{{ $level->name }}" maxlength="50">
              </div>
              <div class="col">
                <label>Nombre corto:</label>
                <input name="nickname" type="text" class="form-control" value="{{ $level->nickname }}" maxlength="50">
              </div>
              <div class="col">
                <label>Ciclo escolar:</label>
                <input name="cycle" type="text" class="form-control" value="{{ $level->cycle }}" maxlength="20" required>
              </div>
              <div class="col">
                <label>Nivel escolar:</label>
                <select class="form-control" name="id_area" required>
                  @if($level->id_area == "1")
                  <option value="{{ $level->id_area }}" selected>Preescolar</option>
                  <option value="2">Primaria</option>
                  <option value="3">Secundaria</option>
                  @elseif($level->id_area == "2")
                  <option value="1">Preescolar</option>
                  <option value="{{ $level->id_area }}" selected>Primaria</option>
                  <option value="3">Secundaria</option>
                  @elseif($level->id_area == "3")
                  <option value="1">Preescolar</option>
                  <option value="2">Primaria</option>
                  <option value="{{ $level->id_area }}" selected>Secundaria</option>
                  @endif
                </select>
              </div>
              <div class="col">
                <label>Fecha de creación:</label>
                <input name="creado" type="text" class="form-control" value="{{ $level->created_at->format('d/m/Y') }}" readonly>
              </div>
              <div class="col">
                <label>Fecha de actualización:</label>
                <input name="actualizado" type="text" class="form-control" value="{{ $level->updated_at->format('d/m/Y') }}" readonly>
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
<div class="container-fluid mb-3">
  <div class="row">
    <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
      <div class="card collapsed-card">
         <div class="card-header" >
           <h3 class="card-title text-uppercase">Registrar grupo</h3>
           <div class="card-tools">
             <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-plus"></i>
             </button>
           </div>
         </div>
          <div class="card-body">
            <form method="post" action="{{ route('admin.group.store') }}" class="form-registrar2" autocomplete="off">
            @csrf
            <div class="row">
              <div class="col" style="display: none;">
                <input name="id_level" type="text" class="form-control" value="{{ $level->id_level }}">
              </div>
              <div class="col">
                <label>Nombre de grupo:</label>
                <input name="name" type="text" class="form-control" placeholder="Ingresar nombre del grupo" maxlength="20" required>
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

<div class="container-fluid pt-3">
  <div class="row">
    <div class="col-md-12">
      <div class="card">
        <div class="card-body">
          <h3 class="text-uppercase font-weight-bold mb-4">Listado de grupos asignados</h3>
            <table class="table table-striped text-center">
                <thead>
                    <tr class="text-uppercase">
                        <th>Nombre</th>
                        <th>Status</th>
                        <th>Ver</th>
                    </tr>
                </thead>
                <tbody>
                  @foreach($level_groups as $level_group)
                  <?php
                    $info=Ce_group::where("id_group","=", $level_group->id_group)->get();
                   ?>
                   @foreach($info as $info2)
                    <tr>
                        <td>{{ $info2->name }}</td>
                        <td>
                            @if($info2->status === "Activo")
                            <form method="post" action="{{ route('group.status.suspendido', $info2->id_group) }}" class="form-suspender2">
                                @csrf
                                @method('put')
                                <button type="submit" class="btn text-success">
                                    <span>Activo</span>
                                </button>
                            </form>
                            @elseif($info2->status === "Suspendido")
                            <form method="post" action="{{ route('group.status.activo', $info2->id_group) }}" class="form-activar2">
                                @csrf
                                @method('put')
                                <button type="submit" class="btn text-danger">
                                    <span>Suspendido</span>
                                </button>
                            </form>
                            @endif
                        </td>
                        <td width="10px">
                            <a href="{{ route('admin.group.edit',$info2) }}" class="btn btn-primary">
                                <span class="fas fa-eye"></span>
                            </a>
                        </td>
                    </tr>
                    @endforeach
                    @endforeach
                </tbody>
            </table>
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
  $('.form-suspender2').submit(function(e){
    e.preventDefault();
    Swal.fire({
    title: '¿Desea suspender el grupo?',
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
  $('.form-activar2').submit(function(e){
    e.preventDefault();
    Swal.fire({
    title: '¿Desea activar el grupo?',
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