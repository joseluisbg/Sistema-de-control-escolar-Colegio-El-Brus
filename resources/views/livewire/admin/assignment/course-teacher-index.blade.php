<?php

use App\Models\User;
use App\Models\Ce_course;
?>
<div>
  <div class="card mb-5">
    <div class="card-header">
      <p class="text-uppercase font-weight-bold">Buscador de materias</p>
      <input wire:model="search" class="form-control" placeholder="Ingrese el nombre de la materia o registro sep">
    </div>
    @if($courses->count())
    <div class="card-body">
      <table class="table table-striped text-center">
        <thead>
          <tr class="text-uppercase">
            <th>Nombre</th>
            <th>Registro SEP</th>
            <th>Nombre SEP</th>
            <th>Asignar</th>
          </tr>
        </thead>
        <tbody>
          @foreach($courses as $course)
          <tr>
            <td>{{ $course->name }}</td>
            @if($course->rep_sep==1)
            <td>Si</td>
            @else
            <td>No</td>
            @endif
            <td>{{ $course->nick_sep }}</td>
            <td width="10px">
              <!-- Button trigger modal -->
              <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#{{ $course->name }}">
                <i class="fas fa-plus"></i>
              </button>

              <!-- Modal -->
              <div class="modal fade" id="{{ $course->name }}" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                <div class="modal-dialog">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h5 class="modal-title" id="staticBackdropLabel">Asignar docente a {{ $course->name }}</h5>
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                      </button>
                    </div>
                    <div class="modal-body">
                      <h4>Seleccione al docente</h4>
                      <form method="post" action="{{ route('admin.assignment.course.teacher.store') }}">
                        @csrf
                        <input type="text" class="form-control" name="id_course" value="{{ $course->id_course }}" style="display: none;">
                        @foreach($teachers as $teacher)
                        <div class="form-check">
                          <input class="form-check-input" type="radio" name="id_user" id="exampleRadios1" value="{{ $teacher->id }}">
                          <label class="form-check-label" for="exampleRadios1">
                            {{ $teacher->name }} {{ $teacher->last_name }}
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
      {{ $courses->links() }}
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
        @if($coTeacher->count())
        <div class="card-body">
          <p class="text-uppercase font-weight-bold mb-4">Listado Asignaturas-Docente</p>

          <table class="table table-striped text-center">
            <thead>
              <tr class="text-uppercase">
                <th>Materia</th>
                <th>Docente</th>
              </tr>
            </thead>
            <tbody>
              @foreach($coTeacher as $cote)
              <?php
              $info = Ce_course::where("id_course", "=", $cote->id_course)->get();
              $info2 = User::where("id", "=", $cote->id_user)->get();
              ?>
              <tr>
                @foreach($info as $inf)
                <td>
                  {{ $inf->name }}
                </td>
                @endforeach

                @foreach($info2 as $inf2)
                <td>
                  {{ $inf2->name." ". $inf2->last_name }}
                </td>
                @endforeach
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