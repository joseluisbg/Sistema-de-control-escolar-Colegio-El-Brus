<div>
    <div class="card mb-5">
        <div class="card-header">
            <p class="text-uppercase font-weight-bold">Buscador de control escolar</p>
            <input wire:model="search" class="form-control" placeholder="Ingrese el nombre de usuario">
        </div>
        @if($teachers->count())
        <div class="card-body">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>id</th>
                        <th>Nombre(s)</th>
                        <th>Apellido(s)</th>
                        <th>Email</th>
                        <th>Estatus</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($teachers as $teacher)
                    <tr>
                        <td>{{ $teacher->id }}</td>
                        <td>{{ $teacher->name }}</td>
                        <td>{{ $teacher->last_name }}</td>
                        <td>{{ $teacher->email }}</td>
                        <td>
                            <form method="post">
                                @if($teacher->status == "Activo")
                                <div class="custom-control custom-switch">
                                    <input type="checkbox" class="custom-control-input" id="{{ $teacher->id }}" checked>
                                    <label class="custom-control-label" for="{{ $teacher->id }}">
                                        <div id="msg"></div>
                                    </label>
                                </div>
                                @endif
                                @if($teacher->status == "Suspendido")
                                <div class="custom-control custom-switch">
                                    <input type="checkbox" class="custom-control-input" id="{{ $teacher->id }}">
                                    <label class="custom-control-label" for="{{ $teacher->id }}">
                                        <div id="msg"></div>
                                    </label>
                                </div>
                                @endif
                            </form>
                        </td>
                        <td width="10px">
                            <a href="{{ route('admin.school.control.edit',$teacher) }}" class="btn btn-primary">
                                <span class="fas fa-eye"></span>
                            </a>
                        </td>
                        <td>
                            <form method="post" action="{{ route('admin.school.control.destroy',$teacher->id) }}">
                                @csrf
                                @method('delete')
                                <button type="submit" class="btn btn-danger">
                                    <span class="fas fa-trash-alt"></span>
                                </button>
                            </form>
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
    </script>
</div>