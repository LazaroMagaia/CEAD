
<!-- Modal Noav Agenda -->

<!-- Modal -->
<div class="modal fade" id="agendaModal" tabindex="-1" aria-labelledby="agendaModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="agendaModalLabel">Agendar Sessão de Tutoria</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <form action="{{ route('admin.agenda.store') }}" method="POST" enctype="multipart/form-data">
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
            <label for="data_hora" class="form-label">Data e Hora</label>
            <input type="datetime-local" class="form-control" id="data_hora" name="data_hora" required>
          </div>
          <div class="mb-3">
            <label for="assunto" class="form-label">Assunto</label>
            <input type="text" class="form-control" id="assunto" name="assunto">
          </div>
          <div class="mb-3">
            <label for="informacoes_adicionais" class="form-label">Informações Adicionais</label>
            <textarea class="form-control" id="informacoes_adicionais" name="informacoes_adicionais"></textarea>
          </div>
          <div class="mb-3">
            <label for="documents" class="form-label">Documentos</label>
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