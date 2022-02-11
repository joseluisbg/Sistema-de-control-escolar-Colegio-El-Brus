<div>
    <div class="card mb-5">
        <div class="card-header">
            <p class="text-uppercase font-weight-bold">Buscador de ciclos</p>
            <input wire:model="search" class="form-control" placeholder="Ingrese el nombre del ciclo">
        </div>
        @if($cycles->count())
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
                    @foreach($cycles as $cycle)
                    <tr>
                        <td>{{ $cycle->name }}</td>
                        <td>{{ $cycle->created_at->format('d/m/Y') }}</td>
                        <td>{{ $cycle->updated_at->format('d/m/Y') }}</td>
                        <td>
                            @if($cycle->status === "Activo")
                            <form method="post" action="{{ route('cycle.status.suspendido', $cycle->id_cycle) }}" class="form-suspender">
                                @csrf
                                @method('put')
                                <button type="submit" class="btn text-success">
                                    <span>Activo</span>
                                </button>
                            </form>
                            @elseif($cycle->status === "Suspendido")
                            <form method="post" action="{{ route('cycle.status.activo', $cycle->id_cycle) }}" class="form-activar">
                                @csrf
                                @method('put')
                                <button type="submit" class="btn text-danger">
                                    <span>Suspendido</span>
                                </button>
                            </form>
                            @endif
                        </td>
                        <td width="10px">
                            <a href="{{ route('admin.cycle.edit',$cycle) }}" class="btn btn-primary">
                                <span class="fas fa-eye"></span>
                            </a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <div class="card-footer">
            {{ $cycles->links() }}
        </div>
        @else
        <div class="card-body p-3">
            <strong style="text-transform: uppercase; color: red;">No existen coincidencias.</strong>
        </div>
        @endif
    </div>
</div>