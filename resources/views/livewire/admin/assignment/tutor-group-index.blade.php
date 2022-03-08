<?php

use App\Models\User;
use App\Models\Ce_course;
?>
<div>
    <div class="mb-5 card">
        <div class="card-header">
            <p class="text-uppercase font-weight-bold">Buscador de grupos</p>
            <input wire:model="search" class="form-control" placeholder="Ingrese el nombre del grupo">
        </div>
        @if ($grupos->count())
            <div class="card-body">
                <table class="table text-center table-striped">
                    <thead>
                        <tr class="text-uppercase">
                            <th>Nombre Grupo</th>
                            <th>Grado</th>
                            <th>Nivel escolar</th>
                            <th>Asignar</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($grupos as $grupo)
                            <tr>
                                <td>{{ $grupo->nomG }}</td>
                                <td>{{ $grupo->nomL }}</td>
                                @if ($grupo->area == 1)
                                    <td>Preescolar</td>
                                @elseif ($grupo->area == 2)
                                    <td>Primaria</td>
                                @elseif ($grupo->area == 3)
                                    <td>Secundaria</td>
                                @endif
                                <td width="10px">
                                    <!-- Button trigger modal -->
                                    <button type="button" class="btn btn-primary" data-toggle="modal"
                                        data-target="#pop{{ $grupo->idlg }}">
                                        <i class="fas fa-plus"></i>
                                    </button>

                                    <!-- Modal -->
                                    <div class="modal fade" id="pop{{ $grupo->idlg }}" data-backdrop="static"
                                        data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel"
                                        aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="staticBackdropLabel">Asignar
                                                        docente
                                                        a {{ $grupo->name }}</h5>
                                                    <button type="button" class="close" data-dismiss="modal"
                                                        aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body">
                                                    <h4>Seleccione al docente</h4>
                                                    <form method="post"
                                                        action="{{ route('admin.assignment.tutor.group.store') }}">
                                                        @csrf
                                                        <input type="text" class="form-control" name="id_lg"
                                                            value="{{ $grupo->idlg }}" style="display: none;">
                                                        @foreach ($teachers as $teacher)
                                                            <div class="form-check">
                                                                <input class="form-check-input" type="radio"
                                                                    name="id_user" id="exampleRadios1"
                                                                    value="{{ $teacher->id }}">
                                                                <label class="form-check-label" for="exampleRadios1">
                                                                    {{ $teacher->name }}
                                                                    {{ $teacher->last_name }}
                                                                </label>
                                                            </div>
                                                        @endforeach
                                                        <button type="button" class="btn btn-secondary"
                                                            data-dismiss="modal">Cerrar</button>
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
                {{ $grupos->links() }}
            </div>
        @else
            <div class="p-3 card-body">
                <strong style="text-transform: uppercase; color: red;">No existen coincidencias.</strong>
            </div>
        @endif
    </div>
</div>


</div>
