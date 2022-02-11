<div>
    <div class="card mb-5">
        <div class="card-header">
            <p class="text-uppercase font-weight-bold">Buscador de grupos</p>
            <input wire:model="search" class="form-control" placeholder="Ingrese el nombre del grupo">
        </div>
        @if($groups->count())
        <div class="card-body">
            <table class="table table-striped text-center">
                <thead>
                    <tr class="text-uppercase">
                        <th>Nombre</th>
                        <th>Fecha de creación</th>
                        <th>Fecha de actualización</th>
                        <th>Estatus</th>
                        <th>Ver</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($groups as $group)
                    <tr>
                        <td>{{ $group->name }}</td>
                        <td>{{ $group->created_at->format('d/m/Y') }}</td>
                        <td>{{ $group->updated_at->format('d/m/Y') }}</td>
                        <td>
                            @if($group->status === "Activo")
                            <form method="post" action="{{ route('group.status.suspendido', $group->id_group) }}" class="form-suspender">
                                @csrf
                                @method('put')
                                <button type="submit" class="btn text-success">
                                    <span>Activo</span>
                                </button>
                            </form>
                            @elseif($group->status === "Suspendido")
                            <form method="post" action="{{ route('group.status.activo', $group->id_group) }}" class="form-activar">
                                @csrf
                                @method('put')
                                <button type="submit" class="btn text-danger">
                                    <span>Suspendido</span>
                                </button>
                            </form>
                            @endif
                        </td>
                        <td width="10px">
                            <a href="{{ route('admin.group.edit',$group) }}" class="btn btn-primary">
                                <span class="fas fa-eye"></span>
                            </a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <div class="card-footer">
            {{ $groups->links() }}
        </div>
        @else
        <div class="card-body p-3">
            <strong style="text-transform: uppercase; color: red;">No existen coincidencias.</strong>
        </div>
        @endif
    </div>
</div>