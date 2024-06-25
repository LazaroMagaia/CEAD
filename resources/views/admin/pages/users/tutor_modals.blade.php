
<div class="modal fade" id="NovoTutorModal" tabindex="-1" style="display: none;" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="NovoTutorModal">Novo Tutor</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <form action="{{route('admin.user.tutor.store')}}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="row">
              <div class="col-12 mb-3">
                <label for="nome" class="form-label">Nome*</label>
                <input type="text" id="nome" name="name" class="form-control" placeholder="Nome">
              </div>
              <div class="col-12 mb-3">
                <label for="email" class="form-label">Email*</label>
                <input type="text" id="email" name="email" class="form-control" placeholder="Email">
              </div>
              <div class="col-12 mb-3">
                <label for="curso" class="form-label">Curso*</label>
                <select class="form-select" id="nivel_academico" name="nivel_academico"
                   aria-label="Default select example">
                  <option selected="">Open this select menu</option>
                    <option value="Licenciado">Licenciado(a)</option>
                    <option value="Mestrado">Mestrado(a)</option>
                    <option value="Doutorado">Doutorado(a)</option>
                </select>
              </div>
              <div class="col-12 mb-3">
                <label for="especialidade" class="form-label">Especialidade</label>
                <input type="text" id="especialidade" name="especialidade" class="form-control" 
                    placeholder="ex: especialista em base de dados">
              </div>

              <div class="col-12 mb-3">
                <label for="contacto" class="form-label">Contacto*</label>
                <input type="text" id="contacto" name="contacto" class="form-control" placeholder="contacto">
              </div>
              <div class="mb-3">
                <label for="formFile" class="form-label">Certificado</label>
                <input class="form-control" name="certificado" type="file" id="formFile">
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

<!---     EDIT TUTOR      ---->
@foreach($tutores as $tutor)
<div class="modal fade" id="EditTutorModal{{$tutor->id}}" tabindex="-1" style="display: none;" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="EditTutorModal{{$tutor->id}}">Editar Tutor {{$tutor->name}}</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <form action="{{route('admin.user.tutor_update.update',$tutor->id)}}" method="post" 
            enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="row">
              <div class="col-12 mb-3">
                <label for="nome" class="form-label">Nome*</label>
                <input type="text" id="nome" name="name" class="form-control"
                value="{{$tutor->name}}" placeholder="Nome">
              </div>
              <div class="col-12 mb-3">
                <label for="email" class="form-label">Email*</label>
                <input type="text" id="email" name="email" class="form-control" 
                value="{{$tutor->email}}" placeholder="Email">
              </div>
              <div class="col-12 mb-3">
                <label for="curso" class="form-label">Curso*</label>
                <select class="form-select" id="nivel_academico" name="nivel_academico"
                   aria-label="Default select example">
                  <option selected="">Open this select menu</option>
                    <option value="Licenciado" {{$tutor->tutor->nivel_academico == 'Licenciado' ? 'selected' : ''}}>
                        Licenciado(a)</option>
                    <option value="Mestrado"  {{$tutor->tutor->nivel_academico == 'Mestrado' ? 'selected' : ''}}
                    >Mestrado(a)</option>
                    <option value="Doutorado"  {{$tutor->tutor->nivel_academico == 'Doutorado' ? 'selected' : ''}}
                    >Doutorado(a)</option>
                </select>
              </div>
              <div class="col-12 mb-3">
                <label for="especialidade" class="form-label">Especialidade</label>
                <input type="text" id="especialidade" name="especialidade" class="form-control"
                 value="{{$tutor->tutor->especialidade}}">
              </div>

              <div class="col-12 mb-3">
                <label for="contacto" class="form-label">Contacto*</label>
                <input type="text" id="contacto" name="contacto" class="form-control"
                value="{{$tutor->tutor->contacto}}" placeholder="contacto">
              </div>
              <div class="mb-3">
                <label for="formFile" class="form-label">Certificado</label>
                <input class="form-control" name="certificado" type="file"
                value="{{$tutor->tutor->certificado}}" id="formFile" mul>
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


<!---     SHOW TUTOR      ---->
@foreach($tutores as $tutor)
<div class="modal fade" id="ShowTutorModal{{$tutor->id}}" tabindex="-1" style="display: none;" aria-hidden="true">
    <div class="modal-dialog  modal-lg" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="ShowTutorModal{{$tutor->id}}">Editar Tutor {{$tutor->name}}</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <form action="{{route('admin.user.tutor.tutor_update_all',$tutor->tutor->id)}}" method="post" 
            enctype="multipart/form-data">
            @csrf
            <div class="row">
                <div class="col-6 mb-3">
                  <label for="nome" class="form-label">Nome*</label>
                  <input type="text" id="nome" name="name" disabled class="form-control"
                  value="{{$tutor->name}}" placeholder="Nome">
                </div>
                <div class="col-6 mb-3">
                  <label for="email" class="form-label">Email*</label>
                  <input type="text" id="email" name="email" disabled class="form-control" 
                  value="{{$tutor->email}}" placeholder="Email">
                </div>
                <div class="col-6 mb-3">
                  <label for="curso" class="form-label">Curso*</label>
                  <select class="form-select" id="nivel_academico" disabled name="nivel_academico"
                    aria-label="Default select example">
                    <option selected="">Open this select menu</option>
                      <option value="Licenciado" {{$tutor->tutor->nivel_academico == 'Licenciado' ? 'selected' : ''}}>
                          Licenciado(a)</option>
                      <option value="Mestrado"  {{$tutor->tutor->nivel_academico == 'Mestrado' ? 'selected' : ''}}
                      >Mestrado(a)</option>
                      <option value="Doutorado"  {{$tutor->tutor->nivel_academico == 'Doutorado' ? 'selected' : ''}}
                      >Doutorado(a)</option>
                  </select>
                </div>
                <div class="col-6 mb-3">
                  <label for="especialidade" class="form-label">Especialidade</label>
                  <input type="text" id="especialidade" disabled name="especialidade" class="form-control"
                  value="{{$tutor->tutor->especialidade}}">
                </div>

                <div class="col-6 mb-3">
                  <label for="contacto" class="form-label">Contacto*</label>
                  <input type="text" id="contacto" name="contacto" disabled class="form-control"
                  value="{{$tutor->tutor->contacto}}" placeholder="contacto">
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
@endforeach


<!---     REMOVE TUTOR      ---->
@foreach($tutores as $tutor)
<div class="modal fade" id="RemoveTutorModal{{$tutor->id}}" tabindex="-1" style="display: none;" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
            <h5 class="modal-title" id="RemoveTutorModal{{$tutor->id}}">Editar Tutor {{$tutor->name}}</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
            <form action="{{route('admin.user.tutor_destroy.destroy',$tutor->id)}}" method="post">
                @csrf
                @method('DELETE')
                <p>Deseja remover o tutor {{$tutor->name}}</p>
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
</div>
@endforeach