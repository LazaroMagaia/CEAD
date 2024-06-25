<!---   Tuma Estudante Modal  --->
<div class="modal fade" id="TurmaEstudanteModal" tabindex="-1" style="display: none;" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="TurmaEstudanteModal">Inserir estudante a Turma</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <form action="{{route('admin.settings.Turma_estudante.store')}}" method="post">
            @csrf
                <input type="hidden" name="turma_id" value="{{$turma->id}}">
                <div class="row">
                    <div class="col-12 mb-3">
                        <label for="estudante_id" class="form-label">Estudante</label>
                        <select class="form-select" id="estudante_id" name="estudante_id"
                            aria-label="Default select example">
                            <option selected="">Open this select menu</option>
                            @foreach($students_not_in_turma as $student)
                            <option value="{{$student->id}}">{{\App\Models\User::find($student->user_id)->name}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
          </div>
          <div class="modal-footer">
          <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">
              Cancelar
            </button>
            <button type="submit" class="btn btn-primary">Confirmar</button>
          </div>
          </form>
      </div>
    </div>
</div>

@foreach($students as $student)
<div class="modal fade" id="TurmaEstudanteRemoveModal{{$student->id}}" tabindex="-1" style="display: none;" 
  aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="TurmaEstudanteRemoveModal{{$student->id}}">Inserir Alunoa a Turma</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <form action="{{route('admin.settings.Turma_estudante.destroy')}}" method="post">
            @csrf
            @method('DELETE')
            <input type="hidden" name="turma_id" value="{{$turma->id}}">
            <input type="hidden" name="estudante_id" value="{{$student->id}}">
            <p>Tem certeza que deseja remover o aluno {{\App\Models\User::find($student->user_id)->name}} 
              da turma <strong>{{$turma->nome}}</strong> ? </p>
          </div>
          <div class="modal-footer">
          <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">
              Cancelar
            </button>
            <button type="submit" class="btn btn-primary">Confirmar</button>
          </div>
          </form>
      </div>
    </div>
</div>
@endforeach