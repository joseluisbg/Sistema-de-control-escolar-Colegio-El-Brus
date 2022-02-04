<div>
    <div class="card mb-5">
        <div class="card-header">
            <p class="text-uppercase font-weight-bold">Buscador de alumnos</p>
            <input wire:model="search" class="form-control" placeholder="Ingrese el nombre o la matricula del alumno">
        </div>
        @if($students->count())
        <div class="card-body">
            <table class="table table-striped text-center">
                <thead>
                    <tr class="text-uppercase">
                        <th>Matricula</th>
                        <th>Nombre</th>
                        <th>Curp</th>
                        <th>Estatus</th>
                        <th>Ver</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($students as $student)
                    <tr>
                        <td>{{ $student->matricula }}</td>
                        <td>{{ $student->name }}</td>
                        <td>{{ $student->curp }}</td>
                        <td>
                            @if($student->status === "Activo")
                            <form method="post" action="{{ route('student.status.suspendido',$student->id_student) }}" class="form-suspendido">
                                @csrf
                                @method('put')
                                <button type="submit" class="btn text-success">
                                    <span>Activo</span>
                                </button>
                            </form>
                            @elseif($student->status === "Suspendido")
                            <form method="post" action="{{ route('student.status.activo',$student->id_student) }}">
                                @csrf
                                @method('put')
                                <button type="submit" class="btn text-danger">
                                    <span>Suspendido</span>
                                </button>
                            </form>
                            @endif
                        </td>
                        <td width="10px">
                            <a href="{{ route('admin.student.edit',$student->id_student) }}" class="btn btn-primary">
                                <span class="fas fa-eye"></span>
                            </a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <div class="card-footer">
            {{ $students->links() }}
        </div>
        @else
        <div class="card-body p-3">
            <strong style="text-transform: uppercase; color: red;">No existen coincidencias.</strong>
        </div>
        @endif
    </div>
    </script>
</div>
