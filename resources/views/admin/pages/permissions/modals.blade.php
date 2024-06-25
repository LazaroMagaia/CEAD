
<div class="modal fade" id="permissionModal" tabindex="-1" style="display: none;" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel1">Novo nivel de acesso</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <form action="{{route('admin.permission.store')}}" method="post">
            @csrf
            <div class="row">
              <div class="col mb-3">
                <label for="nome" class="form-label">Nome</label>
                <input type="text" id="nome" name="nome" class="form-control" placeholder="Enter Name">
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



<!----EDIT MODAL --->
@foreach($permissions as $permission)
<div class="modal fade" id="EditpermissionModal{{$permission->id}}" tabindex="-1" style="display: none;" 
    aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel1">Editar nivel de acesso {{$permission->nome}}</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <form action="{{route('admin.permission.update',$permission->id)}}" method="post">
            @csrf
            @method('PUT')
            <div class="row">
              <div class="col mb-3">
                <label for="nome" class="form-label">Nome</label>
                <input type="text" id="nome" name="nome" class="form-control" 
                 value="{{$permission->nome}}" placeholder="Enter Name">
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


<!----DELETE MODAL --->
@foreach($permissions as $permission)
<div class="modal fade" id="RemovePermissionModal{{$permission->id}}" tabindex="-1" style="display: none;" 
    aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel1">Remover nivel de acesso</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <form action="{{route('admin.permission.destroy',$permission->id)}}" method="post">
            @csrf
            @method('DELETE')
           
            <p>Tem certeza que deseja remover o niel de acesso {{$permission->nome}} ? </p>
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
