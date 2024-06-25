
<div class="modal fade" id="DisciplinaModal" tabindex="-1" style="display: none;" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="DisciplinaModal">Nova disciplina</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <form action="{{route('admin.settings.disciplina.store')}}" method="post">
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


<!----   EDIT MODEL  ---->
@foreach($disciplinas as $disciplina)
<div class="modal fade" id="EditDisciplinaModal{{$disciplina->disciplina->id}}" tabindex="-1" style="display: none;" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="{{$disciplina->disciplina->id}}">Editar Disciplina {{$disciplina->disciplina->nome}}</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <form action="{{route('admin.settings.disciplina.update',$disciplina->disciplina->id)}}" method="post">
            @csrf
            @method('PUT')
            <div class="row">
              <div class="col mb-3">
                <label for="nome" class="form-label">Nome</label>
                <input type="text" id="nome" name="nome" class="form-control" 
                value="{{$disciplina->disciplina->nome}}" placeholder="Enter Name">
              </div>
            </div>
      
            <div class="col-12 mb-3">
                <label for="curso_id" class="form-label">Curso</label>
                <select class="form-select" id="curso_id" name="curso_id"
                    aria-label="Default select example">
                    <option selected="">Open this select menu</option>
                    @foreach($cursos as $curso)
                    <option value="{{$curso->id}}" {{$curso->id === $disciplina->curso->id ? 'selected' : ''}}
                    >{{$curso->nome}}</option>
                    @endforeach
                </select>
            </div>

            <div class="col-12 mb-3">
                <label for="ano" class="form-label">Ano da disciplina</label>
                <select class="form-select" id="ano" name="ano"
                   aria-label="Default select example">
                  <option selected="">Open this select menu</option>
                  <option value="1" {{$disciplina->ano === 1 ? 'selected' : ''}}>1 ANO</option>
                  <option value="2" {{$disciplina->ano === 2 ? 'selected' : ''}}>2 ANOS</option>
                  <option value="3" {{$disciplina->ano === 3 ? 'selected' : ''}}>3 ANOS</option>
                  <option value="4" {{$disciplina->ano === 4 ? 'selected' : ''}}>4 ANOS</option>
                  <option value="5" {{$disciplina->ano === 5 ? 'selected' : ''}}>5 ANOS</option>
                  <option value="6" {{$disciplina->ano === 6 ? 'selected' : ''}}>6 ANOS</option>
                  <option value="7" {{$disciplina->ano === 7 ? 'selected' : ''}}>7 ANOS</option>
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


<!----   REMOVER MODEL  ---->
@foreach($disciplinas as $disciplina)
<div class="modal fade" id="RemoveDisciplinaModal{{$disciplina->disciplina->id}}" tabindex="-1" style="display: none;" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="RemoveDisciplinaModal{{$disciplina->disciplina->id}}">Remover Disciplina</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <form action="{{route('admin.settings.disciplina.destroy',$disciplina->disciplina->id)}}" method="post">
              @csrf
              @method('DELETE')
          <p>Deseja remover a disciplina {{$disciplina->disciplina->nome}}</p>  
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
