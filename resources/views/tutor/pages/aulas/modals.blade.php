
<!-- Modal Nova Agenda -->

<div class="modal fade" id="agendaModal" tabindex="-1" aria-labelledby="agendaModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="agendaModalLabel">Agendar Aula de Tutoria</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <form action="{{ route('tutor.aula.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="modal-body">
            <div class="mb-3">
                <label for="disciplina_id" class="form-label">Disciplina</label>
                <select class="form-select" id="disciplina_id" name="disciplina_id" required>
                    @foreach($disciplinas as $disciplina)
                    <option value="{{ $disciplina->id }}">{{ $disciplina->nome }}</option>
                    @endforeach
                </select>
            </div>
            <div class="mb-3">
                <label for="curso_id" class="form-label">Curso</label>
                <select class="form-select" id="curso_id" name="curso_id" required>
                    @foreach($cursos as $curso)
                    <option value="{{ $curso->id }}">{{ $curso->nome }}</option>
                    @endforeach
                </select>
            </div>

            <div class="mb-3">
                <label for="titulo" class="form-label">Título</label>
                <input type="text" class="form-control" id="titulo" name="titulo" required>
            </div>
            <div class="mb-3">
                <label for="descricao" class="form-label">Descrição</label>
                <textarea class="form-control" id="descricao" name="descricao"></textarea>
            </div>
            <div class="mb-3">
                <label for="link" class="form-label">Link para a aula online</label>
                <input type="url" class="form-control" id="link" name="link">
            </div>
            <div class="mb-3">
                <label for="documents" class="form-label">Documentos Auxiliares</label>
                <input type="file" class="form-control" id="documents" name="documents[]" multiple>
            </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
          <button type="submit" class="btn btn-primary">Salvar</button>
        </div>
      </form>
    </div>
  </div>
</div>


<!---- MODEL EDITAR AULA ---->
@foreach($aulas as $aula)
<div class="modal fade" id="agendaEditarModal{{$aula->id}}" tabindex="-1" aria-labelledby="agendaEditarModal{{$aula->id}}" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="agendaEditarModal{{$aula->id}}">
          @if(isset($aula)) Editar Aula de Tutoria @else Agendar Aula de Tutoria @endif
        </h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <form action="{{ isset($aula) ? route('tutor.aula.update', $aula->id) : route('tutor.aula.store') }}" method="POST" enctype="multipart/form-data">
        @csrf

        @if(isset($aula))
          @method('PUT')
        @endif

        <div class="modal-body">
            <div class="mb-3">
                <label for="disciplina_id" class="form-label">Disciplina</label>
                <select class="form-select" id="disciplina_id" name="disciplina_id" required>
                    @foreach($disciplinas as $disciplina)
                    <option value="{{ $disciplina->id }}" {{ isset($aula) && $aula->disciplina_id == $disciplina->id ? 'selected' : '' }}>
                        {{ $disciplina->nome }}
                    </option>
                    @endforeach
                </select>
            </div>
            <div class="mb-3">
                <label for="curso_id" class="form-label">Curso</label>
                <select class="form-select" id="curso_id" name="curso_id" required>
                    @foreach($cursos as $curso)
                    <option value="{{ $curso->id }}" {{ isset($aula) && $aula->curso_id == $curso->id ? 'selected' : '' }}>
                        {{ $curso->nome }}
                    </option>
                    @endforeach
                </select>
            </div>

            <div class="mb-3">
                <label for="titulo" class="form-label">Título</label>
                <input type="text" class="form-control" id="titulo" name="titulo" required value="{{ isset($aula) ? $aula->titulo : '' }}">
            </div>
            <div class="mb-3">
                <label for="descricao" class="form-label">Descrição</label>
                <textarea class="form-control" id="descricao" name="descricao">{{ isset($aula) ? $aula->descricao : '' }}</textarea>
            </div>
            <div class="mb-3">
                <label for="link" class="form-label">Link para a aula online</label>
                <input type="url" class="form-control" id="link" name="link" value="{{ isset($aula) ? $aula->link : '' }}">
            </div>
            <div class="mb-3">
                <label for="documents" class="form-label">Documentos Auxiliares</label>
                <input type="file" class="form-control" id="documents" name="documents[]" multiple>
            </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
          <button type="submit" class="btn btn-primary">
            @if(isset($aula)) Atualizar @else Salvar @endif
          </button>
        </div>
      </form>
    </div>
  </div>
</div>
@endforeach


<!---- MODEL Remover DELETE ---->
@foreach($aulas as $aula)
<div class="modal fade" id="agendaRemoverModal{{$aula->id}}" tabindex="-1" aria-labelledby="agendaRemoverModal{{$aula->id}}" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="agendaRemoverModal{{$aula->id}}">
            Remover Aula de Tutoria
        </h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <form action="{{ isset($aula) ? route('tutor.aula.destroy', $aula->id) : route('tutor.aula.store') }}" method="POST" enctype="multipart/form-data">
        @csrf

        @if(isset($aula))
          @method('DELETE')
        @endif

        <div class="modal-body">
            <p>Deseja realmente remover essa aula ?</p>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
          <button type="submit" class="btn btn-primary">
            Confirmar
          </button>
        </div>
      </form>
    </div>
  </div>
</div>
@endforeach