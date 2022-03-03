<div>
  <div class="card mb-5">
    <div class="card-header">
      <p class="text-uppercase font-weight-bold">Buscador de materias</p>
      <input wire:model="search" class="form-control" placeholder="Ingrese el nombre de la materia o registro sep">
    </div>
    <div class="card-body">
        @if($students->count())
        <form method="post" action="{{ route('admin.assignment.student.group.store') }}" class="form-registrar" autocomplete="off">
            @csrf
            @foreach($infolg as $infolg2)
            <input type="text" class="form-control" name="id_lg" value="{{ $infolg2->idlg }}" style="display: none;">
            @endforeach
            @foreach($students as $student)
            <div class="form-check">
                <input type="checkbox" name="check_lista[]" value="{{ $student->id_student }}">
                <label class="form-check-label" for="exampleRadios1">
                    {{ $student->name }}
                </label>
            </div>
            @endforeach
            <button type="submit" class="btn btn-primary">Asignar</button>
        </form>
        <div class="card-footer">
            {{ $students->links() }}
        </div>
        @else
        <div class="card-body p-3">
            <strong style="text-transform: uppercase; color: red;">No existen registros.</strong>
        </div>
   @endif
    </div>
  </div>
</div>
