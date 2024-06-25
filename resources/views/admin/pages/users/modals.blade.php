<div class="modal fade" id="NovoEstudanteModal" tabindex="-1" style="display: none;" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="NovoEstudanteModal">Novo Estudante</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <form action="{{route('admin.user.estudante.store')}}" method="post">
            @csrf
            <div class="row">
              <div class="col-12 mb-3">
                <label for="nome" class="form-label">Nome</label>
                <input type="text" id="nome" name="name" class="form-control" placeholder="Nome">
              </div>
              <div class="col-12 mb-3">
                <label for="email" class="form-label">Email</label>
                <input type="text" id="email" name="email" class="form-control" placeholder="Email">
              </div>
              <div class="col-12 mb-3">
                <label for="curso" class="form-label">Curso</label>
                <select class="form-select" id="cursos_id" name="cursos_id"
                   aria-label="Default select example">
                  <option selected="">Open this select menu</option>
                  @foreach($cursos as $curso)
                  <option value="{{$curso->id}}">{{$curso->nome}}</option>
                  @endforeach
                </select>
              </div>
              <div class="col-12 mb-3">
                <label for="contacto" class="form-label">Contacto</label>
                <input type="text" id="contacto" name="contacto" class="form-control" placeholder="contacto">
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



<!---- EDITAR ESTUDANTE --->
@foreach($estudantes as $estudante)
<div class="modal fade" id="EditarEstudanteModal{{$estudante->id}}" tabindex="-1" style="display: none;" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="EditarEstudanteModal{{$estudante->id}}">Novo Estudante</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <form action="{{route('admin.user.estudante.update',$estudante->id)}}" method="post">
            @csrf
            @method('PUT')
            <div class="row">
              <div class="col-12 mb-3">
                <label for="nome" class="form-label">Nome</label>
                <input type="text" id="nome" name="name" class="form-control"
                value="{{$estudante->name}}" placeholder="Nome">
              </div>
              <div class="col-12 mb-3">
                <label for="email" class="form-label">Email</label>
                <input type="text" id="email" name="email" class="form-control"
                value="{{$estudante->email}}" placeholder="Email">
              </div>
              <div class="col-12 mb-3">
                <label for="curso" class="form-label">Curso</label>
                <select class="form-select" id="cursos_id" name="cursos_id"
                   aria-label="Default select example">
                  <option selected="">Open this select menu</option>  
                  @foreach($cursos as $curso) <!-- Renamed to $curso -->
                      <option value="{{ $curso->id }}"
                      {{$curso->id === $estudante->estudante->cursos_id ? 'selected' : ''}}>{{ $curso->nome }}</option>
                  @endforeach
                </select>
              </div>
              <div class="col-12 mb-3">
                <label for="contacto" class="form-label">Contacto</label>
                <input type="text" id="contacto" name="contacto" class="form-control"
                value="{{$estudante->estudante->contacto}}" placeholder="contacto">
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



<!---- EDITAR ESTUDANTE --->
@foreach($estudantes as $estudante)
<div class="modal fade" id="RemoverEstudanteModal{{$estudante->id}}" tabindex="-1" style="display: none;" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="RemoverEstudanteModal{{$estudante->id}}">Remover Estudante</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <form action="{{route('admin.user.estudante.destroy',$estudante->id)}}" method="post">
            @csrf
            @method('DELETE')
            <p>Deseja remover o estudante {{$estudante->name}} ? </p>
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
