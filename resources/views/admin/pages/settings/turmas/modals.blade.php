

<div class="modal fade" id="TurmaModal" tabindex="-1" style="display: none;" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="TurmaModal">Nova Turma</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <form action="{{route('admin.settings.turmas.store')}}" method="post">
            @csrf
            <div class="row">
              <div class="col mb-3">
                <label for="nome" class="form-label">Nome</label>
                <input type="text" id="nome" name="nome" class="form-control" placeholder="Enter Name">
              </div>
            </div>
      
            <div class="col-12 mb-3">
                <label for="curso_id" class="form-label">Curso</label>
                <select class="form-select" id="curso_id" name="curso_id"
                    aria-label="Default select example">
                    <option selected="">Open this select menu</option>
                    @foreach($cursos as $curso)
                    <option value="{{$curso->id}}">{{$curso->nome}}</option>
                    @endforeach
                </select>
            </div>

            <div class="col-12 mb-3">
                <label for="ano" class="form-label">Ano da disciplina</label>
                <select class="form-select" id="ano" name="ano"
                   aria-label="Default select example">
                  <option selected="">Open this select menu</option>
                  <option value="1">1 ANO</option>
                  <option value="2">2 ANO</option>
                  <option value="3">3 ANO</option>
                  <option value="4">4 ANO</option>
                  <option value="5">5 ANO</option>
                  <option value="6">6 ANO</option>
                  <option value="7">7 ANO</option>
                </select>
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


@foreach($turmas as $turma)
<div class="modal fade" id="EditarTurmaModal{{$turma->id}}" tabindex="-1" style="display: none;" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="EditarTurmaModal{{$turma->id}}">Nova Turma</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <form action="{{route('admin.settings.turmas.update',$turma->id)}}" method="post">
            @csrf
            @method('PUT')
            <div class="row">
              <div class="col mb-3">
                <label for="nome" class="form-label">Nome</label>
                <input type="text" id="nome" name="nome" class="form-control" 
                value="{{$turma->nome}}" placeholder="Enter Name">
              </div>
            </div>
      
            <div class="col-12 mb-3">
                <label for="curso_id" class="form-label">Curso</label>
                <select class="form-select" id="curso_id" name="curso_id"
                    aria-label="Default select example">
                    <option selected="">Open this select menu</option>
                    @foreach($cursos as $curso)
                    <option value="{{$curso->id}}"
                    {{$curso->id == $turma->curso_id ? 'selected' : ''}}>{{$curso->nome}}</option>
                    @endforeach
                </select>
            </div>

            <div class="col-12 mb-3">
                <label for="ano" class="form-label">Ano da Turma</label>
                <select class="form-select" id="ano" name="ano"
                   aria-label="Default select example">
                  <option selected="">Open this select menu</option>
                  <option value="1" {{$turma->ano === 1 ? 'selected' : ''}}>1 ANO</option>
                  <option value="2" {{$turma->ano === 2 ? 'selected' : ''}}>2 ANOS</option>
                  <option value="3" {{$turma->ano === 3 ? 'selected' : ''}}>3 ANOS</option>
                  <option value="4" {{$turma->ano === 4 ? 'selected' : ''}}>4 ANOS</option>
                  <option value="5" {{$turma->ano === 5 ? 'selected' : ''}}>5 ANOS</option>
                  <option value="6" {{$turma->ano === 6 ? 'selected' : ''}}>6 ANOS</option>
                  <option value="7" {{$turma->ano === 7 ? 'selected' : ''}}>7 ANOS</option>
                </select>
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
@endforeach


@foreach($turmas as $turma)
<div class="modal fade" id="RemoveTurmaModal{{$turma->id}}" tabindex="-1" style="display: none;" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="RemoveTurmaModal{{$turma->id}}">Remover Turma</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
            <form action="{{route('admin.settings.turmas.destroy',$turma->id)}}" method="post">
                @csrf
                @method('PUT')
                <p>Tem certeza que deseja remover a turma {{$turma->nome}} ?</p>
                <div class="modal-footer">
                <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">
                    Cancelar
                    </button>
                    <button type="submit" class="btn btn-primary">Confirmar</button>
                </div>
            </div>
          </form>
      </div>
    </div>
</div>
@endforeach
