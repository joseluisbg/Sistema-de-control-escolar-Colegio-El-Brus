<div>
    <div class="card mb-5">
        <div class="card-header">
            <p class="text-uppercase font-weight-bold">Buscador de directores</p>
            <input wire:model="search" class="form-control" placeholder="Ingrese el nombre del director">
        </div>
        @if($teachers->count())
        <div class="card-body">
            <table class="table table-striped text-center">
                <thead>
                    <tr class="text-uppercase">
                        <th>Nombre(s)</th>
                        <th>Apellido(s)</th>
                        <th>Email</th>
                        <th>Estatus</th>
                        <th>Ver</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($teachers as $teacher)
                    <tr>
                        <td>{{ $teacher->name }}</td>
                        <td>{{ $teacher->last_name }}</td>
                        <td>{{ $teacher->email }}</td>
                        <td>
                            @if($teacher->status === "Activo")
                            <form method="post" action="{{ route('director.status.suspendido',$teacher->id) }}" class="form-suspender">
                                @csrf
                                @method('put')
                                <button type="submit" class="btn text-success">
                                    <span>Activo</span>
                                </button>
                            </form>
                            @elseif($teacher->status === "Suspendido")
                            <form method="post" action="{{ route('director.status.activo',$teacher->id) }}" class="form-activar">
                                @csrf
                                @method('put')
                                <button type="submit" class="btn text-danger">
                                    <span>Suspendido</span>
                                </button>
                            </form>
                            @endif
                        </td>
                        <td width="10px">
                            <a href="{{ route('admin.director.edit',$teacher) }}" class="btn btn-primary">
                                <span class="fas fa-eye"></span>
                            </a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <div class="card-footer">
            {{ $teachers->links() }}
        </div>
        @else
        <div class="card-body p-3">
            <strong style="text-transform: uppercase; color: red;">No existen coincidencias.</strong>
        </div>
        @endif
    </div>
</div>