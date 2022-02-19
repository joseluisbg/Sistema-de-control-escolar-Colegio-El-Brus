<div>
  <div class="card mb-5">
    <div class="card-header">
      <p class="text-uppercase font-weight-bold">Buscador de materias</p>
      <input wire:model="search" class="form-control" placeholder="Ingrese el nombre de la materia o nombre sep">
    </div>
    @if($ct->count())
    <div class="card-body">
      <table class="table table-striped text-center">
        <thead>
          <tr class="text-uppercase">
            <th>Nombre de materia</th>
            <th>Nickname</th>
            <th>Docente</th>
            <th>Área</th>
            <th>Asignar</th>
          </tr>
        </thead>
        <tbody>
          @foreach($ct as $ct2)
          <tr>
            <td>{{ $ct2->curso }}</td>
            <td>{{ $ct2->nickCurso }}</td>
            <td>{{ $ct2->nomProfe }}{{ $ct2->apellido }}</td>
            <td>{{ $ct2->area }}</td>
            <td width="10px">
              <!-- Button trigger modal -->
              <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#{{ $ct2->curso }}{{ $ct2->id_ct }}">
                <i class="fas fa-plus"></i>
              </button>

              <!-- Modal -->
              <div class="modal fade" id="{{ $ct2->curso }}{{ $ct2->id_ct }}" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                <div class="modal-dialog">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h5 class="modal-title" id="staticBackdropLabel">Asignar {{ $ct2->curso }}-{{ $ct2->nomProfe }}{{ $ct2->apellido }} a grupo</h5>
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                      </button>
                    </div>
                    <div class="modal-body">
                      <h4>Seleccione el grado</h4>
                      <form method="post" action="{{ route('admin.assignment.level.course.store') }}">
                        @csrf
                        <input type="text" class="form-control" name="id_ct" value="{{ $ct2->id_ct }}" style="display: none;">
                        @foreach($lg as $lg2)
                        <div class="form-check">
                          <input class="form-check-input" type="radio" name="id_lg" id="exampleRadios1" value="{{ $lg2->idlg }}">
                          <label class="form-check-label" for="exampleRadios1">
                          {{ $lg2->area }}-{{ $lg2->nomL }} - {{ $lg2->nomG }}
                          </label>
                        </div>
                        @endforeach
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                        <button type="submit" class="btn btn-primary">Asignar</button>
                      </form>
                    </div>
                    <div class="modal-footer">

                    </div>
                  </div>
                </div>
              </div>
            </td>
          </tr>
          @endforeach
        </tbody>
      </table>
    </div>
    <div class="card-footer">
      {{ $ct->links() }}
    </div>
    @else
    <div class="card-body p-3">
      <strong style="text-transform: uppercase; color: red;">No existen coincidencias.</strong>
    </div>
    @endif
  </div>
</div>

<div class="container-fluid pt-3">
  <div class="row">
    <div class="col-md-12">
      <div class="card">
        @if($lgct->count())
        <div class="card-body">
          <p class="text-uppercase font-weight-bold mb-4">Listado Asignatura-Grupo</p>

          <table class="table table-striped text-center">
            <thead>
              <tr class="text-uppercase">
                <th>Materia</th>
                <th>Grupo</th>
              </tr>
            </thead>
            <tbody>
              @foreach($lgct as $lgct2)
              
              <tr>
                <td>
                {{ $lgct2->curso }}-{{ $lgct2->nomProfe }} {{ $lgct2->apellido }}
                </td>
                <td>
                {{ $lgct2->area }}-{{ $lgct2->nomL }} - {{ $lgct2->nomG }}
                </td>
              </tr>
              @endforeach
            </tbody>
          </table>

        </div>
        @else
        <div class="card-body p-3">
          <strong style="text-transform: uppercase; color: red;">No existen coincidencias.</strong>
        </div>
        @endif
      </div>
    </div>
  </div>
</div>