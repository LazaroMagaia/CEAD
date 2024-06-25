
<!--  NOVO CURSO  -->
<div class="modal fade" id="NovoCursoModal" tabindex="-1" style="display: none;" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="NovoCursoModal">Novo Curso</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <form action="{{route('admin.settings.curso.store')}}" method="post">
            @csrf
            <div class="row">
              <div class="col-12 mb-3">
                <label for="nome" class="form-label">Nome</label>
                <input type="text" id="nome" name="nome" class="form-control" 
                placeholder="Ex: faculdade de ciencias">
              </div>
              
              <div class="col-12 mb-3">
                <label for="duracao" class="form-label">Duracao do curso</label>
                <select class="form-select" id="duracao" name="duracao"
                   aria-label="Default select example">
                  <option selected="">Open this select menu</option>
                  <option value="1">1 ANO</option>
                  <option value="2">2 ANOS</option>
                  <option value="3">3 ANOS</option>
                  <option value="4">4 ANOS</option>
                  <option value="5">5 ANOS</option>
                  <option value="6">6 ANOS</option>
                  <option value="7">7 ANOS</option>
                </select>
              </div>

              <div class="col-12 mb-3">
                <label for="faculdades_id" class="form-label">Faculdade</label>
                <select class="form-select" id="faculdades_id" name="faculdades_id"
                   aria-label="Default select example">
                  <option selected="">Open this select menu</option>
                  @foreach($faculdades as $faculdade)
                  <option value="{{$faculdade->id}}">{{$faculdade->nome}}</option>
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

<!--  EDITAR CURSO  -->
@foreach($cursos as $curso)
<div class="modal fade" id="EditCursoModal{{$curso->id}}" tabindex="-1" style="display: none;" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="EditCursoModal{{$curso->id}}">Editar Curso</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <form action="{{route('admin.settings.curso.update',$curso->id)}}" method="post">
            @csrf
            @method('PUT')
            <div class="row">
              <div class="col-12 mb-3">
                <label for="nome" class="form-label">Nome</label>
                <input type="text" id="nome" name="nome" value="{{$curso->nome}}" class="form-control">
              </div>
              <div class="col-12 mb-3">
                <label for="duracao" class="form-label">Faculdade</label>
                <select class="form-select" id="duracao" name="duracao"
                   aria-label="Default select example">
                  <option selected="">Open this select menu</option>
                  <option value="1" {{$curso->duracao === 1 ? 'selected' : ''}}>1 ANO</option>
                  <option value="2" {{$curso->duracao === 2 ? 'selected' : ''}}>2 ANOS</option>
                  <option value="3" {{$curso->duracao === 3 ? 'selected' : ''}}>3 ANOS</option>
                  <option value="4" {{$curso->duracao === 4 ? 'selected' : ''}}>4 ANOS</option>
                  <option value="5" {{$curso->duracao === 5 ? 'selected' : ''}}>5 ANOS</option>
                  <option value="6" {{$curso->duracao === 6 ? 'selected' : ''}}>6 ANOS</option>
                  <option value="7" {{$curso->duracao === 7 ? 'selected' : ''}}>7 ANOS</option>
                </select>
              </div>

              <div class="col-12 mb-3">
                <label for="faculdades_id" class="form-label">Faculdade</label>
                <select class="form-select" id="faculdades_id" name="faculdades_id"
                   aria-label="Default select example">
                  @foreach($faculdades as $faculdade)
                  <option value="{{$faculdade->id}}" 
                  {{$faculdade->id === $curso->faculdades_id ? 'selected' : ''}}>{{$faculdade->nome}}</option>
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
@endforeach

<!--  REMOVER CURSO  -->
@foreach($cursos as $curso)
<div class="modal fade" id="RemoverCursoModal{{$curso->id}}" tabindex="-1" style="display: none;" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="RemoverCursoModal{{$curso->id}}">Remover curso de {{$curso->nome}}</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <form action="{{route('admin.settings.curso.destroy',$curso->id)}}" method="post">
            @csrf
            @method('DELETE')
            <div class="row">
              <p>Deseja remover o curso de {{$curso->nome}} ?</p>
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
