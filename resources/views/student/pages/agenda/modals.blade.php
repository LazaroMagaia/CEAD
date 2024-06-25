

<!-- Modal Update Agenda -->
@foreach($agendas as $agenda)
<div class="modal fade" id="agendashowModal{{$agenda->id}}" tabindex="-1" aria-labelledby="agendashowModal{{$agenda->id}}" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="agendashowModal{{$agenda->id}}">Atualizar Sessão de Tutoria</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
    
        <div class="modal-body">
            <div class="row">
                <div class="col-md-6 mb-3">
                <label for="disciplina_id" class="form-label">Disciplina</label>
                <input type="text" class="form-control" id="data_hora" name="data_hora" disabled
                value="{{ \App\Models\Disciplina::find($agenda->disciplina_id)->nome}}" required>
                </div>
                <div class="col-md-6 mb-3">
                    <label for="data_hora" class="form-label">Data e Hora</label>
                    <input type="datetime-local" class="form-control" id="data_hora" disabled
                    name="data_hora" value="{{ \Carbon\Carbon::parse($agenda->data_hora)->format('Y-m-d\TH:i') }}" required>
                </div>
                <div class="col-md-6 mb-3">
                    <label for="assunto" class="form-label">Assunto</label>
                    <input type="text" class="form-control" id="assunto" name="assunto"  disabled
                    value="{{ $agenda->assunto }}">
                </div>
                <div class="col-md-12 mb-3">
                    <label for="informacoes_adicionais" class="form-label">Informações Adicionais</label>
                    <textarea class="form-control" id="informacoes_adicionais" disabled
                    name="informacoes_adicionais">{{ $agenda->informacoes_adicionais }}</textarea>
                </div>
                <div class="col-md-6 mb-3">
                    <label for="documents" class="form-label">Anexos</label>
                    <ol>
                    @foreach($agenda->documents as $document)
                        <li>
                            <a href="/storage/{{ $document->file_path }}" target="_blank">Ver Anexo</a>
                        </li>
                    @endforeach
                    </ol>
                </div>
            </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
        </div>

    </div>
  </div>
</div>
@endforeach
