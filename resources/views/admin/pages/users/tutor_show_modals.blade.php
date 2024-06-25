

<div class="modal fade" id="ShowTutorModal{{$tutor->id}}" tabindex="-1" style="display: none;" aria-hidden="true">
    <div class="modal-dialog  modal-lg" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="ShowTutorModal{{$tutor->id}}">Tutor {{$user->name}}</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <form action="{{route('admin.user.tutor.tutor_update_all',$tutor->id)}}" method="post" 
            enctype="multipart/form-data">
            @csrf
            <div class="row">
                <div class="col-6 mb-3">
                  <label for="nome" class="form-label">Nome*</label>
                  <input type="text" id="nome" name="name" disabled class="form-control"
                  value="{{$user->name}}" placeholder="Nome">
                </div>
                <div class="col-6 mb-3">
                  <label for="email" class="form-label">Email*</label>
                  <input type="text" id="email" name="email" disabled class="form-control" 
                  value="{{$user->email}}" placeholder="Email">
                </div>
                <div class="col-6 mb-3">
                  <label for="curso" class="form-label">Curso*</label>
                  <select class="form-select" id="nivel_academico" disabled name="nivel_academico"
                    aria-label="Default select example">
                    <option selected="">Open this select menu</option>
                      <option value="Licenciado" {{$tutor->nivel_academico == 'Licenciado' ? 'selected' : ''}}>
                          Licenciado(a)</option>
                      <option value="Mestrado"  {{$tutor->nivel_academico == 'Mestrado' ? 'selected' : ''}}
                      >Mestrado(a)</option>
                      <option value="Doutorado"  {{$tutor->nivel_academico == 'Doutorado' ? 'selected' : ''}}
                      >Doutorado(a)</option>
                  </select>
                </div>
                <div class="col-6 mb-3">
                  <label for="especialidade" class="form-label">Especialidade</label>
                  <input type="text" id="especialidade" disabled name="especialidade" class="form-control"
                  value="{{$tutor->especialidade}}">
                </div>

                <div class="col-6 mb-3">
                  <label for="contacto" class="form-label">Contacto*</label>
                  <input type="text" id="contacto" name="contacto" disabled class="form-control"
                  value="{{$tutor->contacto}}" placeholder="contacto">
                </div>

                <div class="col-12 mb-3">
                  <p> Para o tutor <strong>{{$tutor->name}}</strong> possa lecionar em sua instituição, 
                    por favor, preencha o formulário abaixo que diz respeito aos cursos que ele vai lecionar
                    e às disciplinas nesse determinado curso.
                  </p>
                </div>
        
                <div class="col-6 mb-3">
                <label for="curso" class="form-label">Faculdade*</label>
                  <select class="form-select" id="faculdade_id" name="faculdade_id"
                    aria-label="Default select example">
                    <option selected="">Open this select menu</option>
                    @foreach($faculdades as $faculdade)
                    <option value="{{$faculdade->id}}">{{$faculdade->nome}}</option>
                    @endforeach
                  </select>
                </div>

                <div class="col-6 mb-3">
                  <label for="curso" class="form-label">Curso*</label>
                  <select class="form-select" id="curso_id" name="curso_id" aria-label="Curso">
                      <option selected disabled>Selecione um curso</option>
                      <!-- Options will be populated dynamically using JavaScript -->
                  </select>
              </div>

              <div class="col-6 mb-3">
                <label for="disciplina" class="form-label">Disciplina*</label>
                <select class="form-select" id="disciplina_id" name="disciplina_id" aria-label="Disciplina">
                    <option selected disabled>Selecione uma disciplina</option>
                    <!-- Options will be populated dynamically using JavaScript -->
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


<!-- Modal REMOVE DISCIPLINA TUTOR -->
@foreach($tutor_disciplinas as $tutor_disciplina)
<div class="modal fade" id="RemoveTutorModal{{$tutor_disciplina->id}}" tabindex="-1" style="display: none;" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="RemoveTutorModal{{$tutor_disciplina->id}}">Tutor {{$user->name}}</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <form action="{{route('admin.user.tutor.show_destroy',$tutor->id)}}" method="post" 
            enctype="multipart/form-data">
            @csrf
            @method('DELETE')
            <div class="row d-flex">
                Deseja remover esse a disciplina de 
                    @foreach($disciplinas as $disciplina)
                        @if($tutor_disciplina->disciplina_id == $disciplina->id)
                        <strong>{{$disciplina->nome}}</strong>
                        @endif
                    @endforeach
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
