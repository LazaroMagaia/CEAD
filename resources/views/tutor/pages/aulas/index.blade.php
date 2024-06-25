@include("template.header")

@include("template.sidebar")

<!-- Layout container -->
<div class="layout-page">
@include("template.header2")
@include("tutor.pages.aulas.modals")
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
        <h5 class="card-header">Aulas</h5>
        <button type="button" class="btn btn-primary mx-2" 
        data-bs-toggle="modal" data-bs-target="#agendaModal" style="width: 220px;">Nova Aula</button>
        <div class="table-responsive text-nowrap">
            <table class="table">
            <thead>
                <tr>
                <th>Id</th>
                <th>Titulo</th>
                <th>Descicao</th>
                <th>Disciplina</th>
                <th>curso</th>
                <th>Data</th>
                <th>Acoes</th>
                </tr>
            </thead>
            <tbody class="table-border-bottom-0">
                @foreach($aulas as $aula)
                <tr>
                    <td>
                        {{$aula->id}}
                    </td>
                    <td>{{$aula->titulo}}</td>
                    <td>{{$aula->descricao}}</td>
                    <td>{{\App\Models\Disciplina::find($aula->disciplina_id)->nome}}</td>
                    <td>
                        {{\App\Models\Curso::find($aula->curso_id)->nome}}
                    </td>
                    <td>
                        {{$aula->created_at}}
                    </td>
                    <td class="d-flex flex-wrap">
                        <a class="btn btn-success me-2 text-white" data-bs-toggle="modal" 
                        data-bs-target="#agendaEditarModal{{$aula->id}}" ><i class="bx bx-edit-alt "></i> Edit</a>
                       
                        <a class="btn btn-danger me-2 text-white" data-bs-toggle="modal" 
                        data-bs-target="#agendaRemoverModal{{$aula->id}}"><i class="bx bx-trash "></i> Delete</a>
                    </td>
                </tr>
                @endforeach
            </tbody>
            </table>
        </div>
    </div>
</div>

<!-- / Content -->




@include("template.footer")