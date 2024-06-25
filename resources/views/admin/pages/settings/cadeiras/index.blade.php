@include("template.header")

@include("template.sidebar")

<!-- Layout container -->
<div class="layout-page">
@include("template.header2")
@include("admin.pages.settings.cadeiras.modals")

<!---- HANDLE ERRORS OR SUCESS ---->
<div class="container my-2">
    @if ($message = Session::get('success'))
      <div class="alert alert-success">
          <p>{{ $message }}</p>
      </div>
    @endif

    @if ($message = Session::get('error'))
      <div class="alert alert-danger">
          <p>{{ $message }}</p>
      </div>
    @endif

    @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif


</div>

<!---- HANDLE ERRORS OR SUCESS ---->


<!-- Content wrapper -->
<div class="content-wrapper">
    <!-- Content -->
    <div class="container py-2">
    <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Tables /</span> Basic Tables</h4>
    <div class="card">
        <h5 class="card-header">Disciplinas</h5>
        <div class="row">
            <div class="col-md-3">
            <button type="button" class="btn btn-primary mx-2"  data-bs-toggle="modal" 
                data-bs-target="#DisciplinaModal" style="width: 220px;">Nova disciplina</button>
            </div>
            <div class="col-md-9">
                {{-- <form action="{{route('admin.settings.disciplina.index')}}" method="get" class="px-2">
                    <div class="input-group">
                        <select class="form-select" id="inputGroupSelect04" name="search"
                             aria-label="Example select with button addon">
                            @if(isset($_GET['search']))
                                @foreach($cursos as $curso)
                                <option value="{{$curso->id}}" 
                                {{$_GET['search'] == $curso->id ? 'selected' : ''}}>{{$curso->nome}}</option>
                                @endforeach
                            @else
                                <option selected="">Escolha um curso</option>
                                @foreach($cursos as $curso)
                                <option value="{{$curso->id}}">{{$curso->nome}}</option>
                                @endforeach
                            @endif
       
                        </select>
                        <button class="btn btn-outline-primary" type="submit">Pesquisar</button>
                    </div>
                </form>--}}
            </div>
        </div>
        
        
        <div class="table-responsive text-nowrap px-2">
            <table class="table" id="myTable">
            <thead>
                <tr>
                <th>Ano</th>
                <th>Nome</th>
                <th>Curso</th>
                <th>Acoes</th>
                
                </tr>
            </thead>
            <tbody class="table-border-bottom-0">
               @foreach($disciplinas as $disciplina)
                <tr>
                    <td>
                        <i class="fab fa-bootstrap fa-lg text-primary me-3"></i> {{ $disciplina->ano }}
                    </td>
                    <td>{{$disciplina->disciplina->nome}}</td>
                    <td>{{$disciplina->curso->nome}}</td>
                    <td class="d-flex flex-wrap">
                        <a class="btn btn-success me-2 text-white" data-bs-toggle="modal" 
                        data-bs-target="#EditDisciplinaModal{{$disciplina->disciplina->id}}" ><i class="bx bx-edit-alt "></i> Edit</a>
                       
                        <a class="btn btn-danger me-2 text-white" data-bs-toggle="modal" 
                        data-bs-target="#RemoveDisciplinaModal{{$disciplina->disciplina->id}}"><i class="bx bx-trash "></i> Delete</a>
                    </td>
                </tr>
                @endforeach
            </tbody>
            </table>
        </div>
    </div>
</div>

<!-- / Content -->

<script>
    let table = new DataTable('#myTable', {
    // config options...
    });
</script>

@include("template.footer")