<div>
    <div class="card mb-5">
        <div class="card-header">
            <p class="text-uppercase font-weight-bold">Buscador de academias</p>
            <input wire:model="search" class="form-control" placeholder="Ingrese el nombre de la academia">
        </div>
        @if ($academias->count())
            <div class="card-body">
                <table class="table table-striped text-center">
                    <thead>
                        <tr class="text-uppercase">
                            <th>Nombre</th>
                            <th>Nivel Escolar</th>
                            <th>Ver</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($academias as $academia)
                            <tr>
                                <td>{{ $academia->name }}</td>
                                @if ($academia->id_area == '1')
                                    <td>Preescolar</td>
                                @elseif ($academia->id_area == '2')
                                    <td>Primaria</td>
                                @elseif ($academia->id_area == '3')
                                    <td>Secundaria</td>
                                @endif
                                <td width="10px">
                                    <a href="{{ route('admin.academia.edit', $academia->id_academy) }}"
                                        class="btn btn-primary">
                                        <span class="fas fa-eye"></span>
                                    </a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            <div class="card-footer">
                {{ $academias->links() }}
            </div>
        @else
            <div class="card-body p-3">
                <strong style="text-transform: uppercase; color: red;">No existen coincidencias.</strong>
            </div>
        @endif
    </div>
</div>
