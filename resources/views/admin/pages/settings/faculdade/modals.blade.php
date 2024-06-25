
<!--NOVA FACULDADE -->
<div class="modal fade" id="NovaFaculdadeModal" tabindex="-1" style="display: none;" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="NovaFaculdadeModal">Faculdade</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <form action="{{route('admin.settings.faculdade.store')}}" method="post">
            @csrf
            <div class="row">
              <div class="col-12 mb-3">
                <label for="nome" class="form-label">Nome</label>
                <input type="text" id="nome" name="nome" class="form-control" 
                placeholder="Ex: faculdade de ciencias">
              </div>
              <div class="col-12 mb-3">
                <label for="localizacao" class="form-label">Localizacao</label>
                <input type="text" id="localizacao" name="localizacao" class="form-control" 
                placeholder="Localizacao da faculdade">
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


<!--EDITAR FACULDADE -->
@foreach($faculdades as $faculdade)
<div class="modal fade" id="EditarFaculdadeModal{{$faculdade->id}}" tabindex="-1" style="display: none;" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="EditarFaculdadeModal{{$faculdade->id}}">
            Editar {{$faculdade->nome}}
          </h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <form action="{{route('admin.settings.faculdade.update',$faculdade->id)}}" method="post">
            @csrf
            @method('PUT')
            <div class="row">
              <div class="col-12 mb-3">
                <label for="nome" class="form-label">Nome</label>
                <input type="text" id="nome" name="nome" value="{{$faculdade->nome}}" 
                  class="form-control" >
              </div>
              <div class="col-12 mb-3">
                <label for="localizacao" class="form-label">Localizacao</label>
                <input type="text" id="localizacao"  value="{{$faculdade->localizacao}}"  
                  name="localizacao" class="form-control">
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

<!--REMOVER FACULDADE -->
@foreach($faculdades as $faculdade)
<div class="modal fade" id="RemoverFaculdadeModal{{$faculdade->id}}" tabindex="-1" style="display: none;" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="RemoverFaculdadeModal{{$faculdade->id}}">
            Remover {{$faculdade->nome}}
          </h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <form action="{{route('admin.settings.faculdade.destroy',$faculdade->id)}}" method="post">
            @csrf
            @method('DELETE')
            <p>Tem certeza que deseja remover a  {{$faculdade->nome}}</p>
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

