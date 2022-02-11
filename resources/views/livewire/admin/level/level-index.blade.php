<div>
    <div class="card mb-5">
        <div class="card-header">
            <p class="text-uppercase font-weight-bold">Buscador de grados</p>
            <input wire:model="search" class="form-control" placeholder="Ingrese el nombre del grado o nombre corto">
        </div>
        @if($levels->count())
        <div class="card-body">
            <table class="table table-striped text-center">
                <thead>
                    <tr class="text-uppercase">
                        <th>Ciclo</th>
                        <th>Nivel escolar</th>
                        <th>Nombre</th>
                        <th>Nombre corto</th>
                        <th>Estatus</th>
                        <th>Ver</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($levels as $level)
                    <tr>
                        <td>{{ $level->cycle }}</td>
                        @if($level->id_area == "1")
                        <td>Preescolar</td>
                        @elseif($level->id_area == "2")
                        <td>Primaria</td>
                        @elseif($level->id_area == "3")
                        <td>Secundaria</td>
                        @endif
                        <td>{{ $level->name }}</td>
                        <td>{{ $level->nickname }}</td>
                        <td>
                            @if($level->status === "Activo")
                            <form method="post" action="{{ route('level.status.suspendido', $level->id_level) }}" class="form-suspender">
                                @csrf
                                @method('put')
                                <button type="submit" class="btn text-success">
                                    <span>Activo</span>
                                </button>
                            </form>
                            @elseif($level->status === "Suspendido")
                            <form method="post" action="{{ route('level.status.activo', $level->id_level) }}" class="form-activar">
                                @csrf
                                @method('put')
                                <button type="submit" class="btn text-danger">
                                    <span>Suspendido</span>
                                </button>
                            </form>
                            @endif
                        </td>
                        <td width="10px">
                            <a href="{{ route('admin.level.edit',$level) }}" class="btn btn-primary">
                                <span class="fas fa-eye"></span>
                            </a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <div class="card-footer">
            {{ $levels->links() }}
        </div>
        @else
        <div class="card-body p-3">
            <strong style="text-transform: uppercase; color: red;">No existen coincidencias.</strong>
        </div>
        @endif
    </div>
</div>
