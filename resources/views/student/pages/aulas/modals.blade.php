

<!-- Modal  aula -->
@foreach($aulas as $aula)
<div class="modal fade" id="agendashowModal{{$aula->id}}" tabindex="-1" aria-labelledby="agendashowModal{{$aula->id}}" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="agendashowModal{{$aula->id}}">Atualizar Sessão de Tutoria</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
        <div class="modal-body">
            <div class="row">
                <div class="col-md-6 mb-3">
                <label for="disciplina_id" class="form-label">Disciplina</label>
                <input type="text" class="form-control" id="data_hora" name="data_hora" disabled
                value="{{ \App\Models\Disciplina::find($aula->disciplina_id)->nome}}" required>
                </div>
                <div class="col-md-6 mb-3">
                    <label for="data_hora" class="form-label">Data e Hora</label>
                    <input type="datetime-local" class="form-control" id="data_hora" disabled
                    name="data_hora" value="{{ \Carbon\Carbon::parse($aula->data_hora)->format('Y-m-d\TH:i') }}" required>
                </div>
                <div class="col-md-6 mb-3">
                    <label for="assunto" class="form-label">Titulo</label>
                    <input type="text" class="form-control" id="assunto" name="assunto"  disabled
                    value="{{ $aula->titulo }}">
                </div>
                <div class="col-md-6 mb-3">
                    @php
                        $tutor = \App\Models\Tutor::find($aula->tutor_id);
                        $tutor_name =\App\Models\User::find($tutor->user_id)->name;
                    @endphp
                    <label for="assunto" class="form-label">Docente</label>
                    <input type="text" class="form-control" id="assunto" name="assunto"  disabled
                    value="{{$tutor_name}}">
                </div>
                <div class="col-md-12 mb-3">
                    <label for="informacoes_adicionais" class="form-label">Descricao</label>
                    <textarea class="form-control" id="informacoes_adicionais" disabled
                    name="informacoes_adicionais">{{ $aula->descricao }}</textarea>
                </div>
                <div class="col-md-6 mb-3">
                <label for="link_aula" class="form-label" style="cursor:pointer" onclick="document.getElementById('link_aula').click()">Link da aula</label>
                <a href="{{$aula->link}}" id="link_aula" style="display:none;" target="_blank" rel="noopener noreferrer"></a>
                </div>
                <div class="col-md-12 mb-3">
                    <label for="documents" class="form-label">Anexos</label>
                    <ol>
                    @foreach($aula->documents as $document)
                        <li>
                            <a href="/storage/{{ $document->file_path }}" target="_blank">Ver Anexo</a>
                        </li>
                    @endforeach
                    </ol>
                </div>
            </div>


        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fechar</button>
        </div>
    </div>
  </div>
</div>
@endforeach
