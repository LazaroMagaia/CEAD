

@include("template.header")

@include("template.sidebar")

<!-- Layout container -->
<div class="layout-page">
@include("template.header2")
@include("student.pages.aulas.modals")
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

        <div class="table-responsive text-nowrap">
            <table class="table">
            <thead>
                <tr>
                <th>Id</th>
                <th>Disciplina</th>
                <th>Docente</th>
                <th>Titulo</th>
                <th>Acoes</th>
                </tr>
            </thead>
            <tbody class="table-border-bottom-0">
                @foreach($aulas as $aula)
                    <tr>
                        <td>
                            {{$aula->id}}
                        </td>
                        <td>{{\App\Models\Disciplina::find($aula->disciplina_id)->nome}}</td>
                        <td>
                            @php
                                $tutor = \App\Models\Tutor::find($aula->tutor_id);
                                $tutor_name =\App\Models\User::find($tutor->user_id)->name;
                            @endphp
                            {{$tutor_name}}
                        </td>
                        <td>{{$aula->titulo}}</td>
 
                        <td class="d-flex flex-wrap">
                            <a class="btn btn-info me-2 text-white" data-bs-toggle="modal" 
                            data-bs-target="#agendashowModal{{$aula->id}}" ><i class="bx bx-eye-alt "></i> ver mais</a>
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