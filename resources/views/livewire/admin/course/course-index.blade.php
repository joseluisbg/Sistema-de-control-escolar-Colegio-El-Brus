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
                        <th>Fecha de creación</th>
                        <th>Fecha de actualización</th>
                        <th>Estatus</th>
                        <th>Ver</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($courses as $course)
                    <tr>
                        <td>{{ $course->name }}</td>
                        <td>{{ $course->rep_sep }}</td>
                        <td>{{ $course->nick_sep }}</td>
                        <td>{{ $course->created_at->format('d/m/Y') }}</td>
                        <td>{{ $course->updated_at->format('d/m/Y') }}</td>
                        <td>
                            @if($course->status === "Activo")
                            <form method="post" action="{{ route('course.status.suspendido', $course->id_course) }}" class="form-suspender">
                                @csrf
                                @method('put')
                                <button type="submit" class="btn text-success">
                                    <span>Activo</span>
                                </button>
                            </form>
                            @elseif($course->status === "Suspendido")
                            <form method="post" action="{{ route('course.status.activo', $course->id_course) }}" class="form-activar">
                                @csrf
                                @method('put')
                                <button type="submit" class="btn text-danger">
                                    <span>Suspendido</span>
                                </button>
                            </form>
                            @endif
                        </td>
                        <td width="10px">
                            <a href="{{ route('admin.course.edit',$course) }}" class="btn btn-primary">
                                <span class="fas fa-eye"></span>
                            </a>
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
