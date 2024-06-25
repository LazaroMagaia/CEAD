@include("template.header")

@include("template.sidebar")

<!-- Layout container -->
<div class="layout-page">
@include("template.header2")
@include("admin.pages.users.tutor_show_modals")
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
        <h5 class="card-header">Tutores</h5>
        <button type="button" class="btn btn-primary mx-2" 
        data-bs-toggle="modal" data-bs-target="#ShowTutorModal{{$tutor->id}}" style="width: 220px;">Nova Disciplina</button>
        <div class="table-responsive text-nowrap">
            <table class="table">
            <thead>
                <tr>
                <th>Id</th>
                <th>Disciplina</th>
                <th>Curso</th>
                <th>Faculdade</th>
 
                <th>Acoes</th>
                </tr>
            </thead>
            <tbody class="table-border-bottom-0">
                @foreach($tutor_disciplinas as $tutor_disciplina)
                <tr>
                    <td>
                        {{$tutor_disciplina->id}}
                    </td>
                    <td>
                        @foreach($disciplinas as $disciplina)
                                @if($tutor_disciplina->disciplina_id == $disciplina->id)
                                    {{$disciplina->nome}}
                                @endif
                        @endforeach
                    </td>
                    <td>
                        @foreach($cursos as $curso)
                            @if($tutor_disciplina->curso_id == $curso->id)
                                {{$curso->nome}}
                            @endif
                        @endforeach

                    </td>
                    <td>
                        @foreach($faculdades as $faculdade)
                            @if($tutor_disciplina->faculdade_id == $faculdade->id)
                                {{$faculdade->nome}}
                            @endif
                        @endforeach
                    </td>
                    
                    <td class="d-flex flex-wrap gap-2">
                       
                        <a class="btn btn-danger me-2 text-white" data-bs-toggle="modal" 
                        data-bs-target="#RemoveTutorModal{{$tutor_disciplina->id}}"><i class="bx bx-trash "></i> Delete</a>
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
    // JavaScript to handle the dynamic population of courses based on selected faculty
    document.getElementById('faculdade_id').addEventListener('change', function() {
        var faculdadeId = this.value;
        var cursoSelect = document.getElementById('curso_id');

        // Clear existing options
        cursoSelect.innerHTML = '<option selected disabled>Carregando cursos...</option>';

        // Fetch courses based on selected faculty using AJAX
        fetch('{{ route("all_cursos_index") }}?faculdadeId=' + faculdadeId)
            .then(response => response.json())
            .then(data => {
                // Populate the course select with fetched data
                cursoSelect.innerHTML = '<option selected disabled>Selecione um curso</option>';
                data.forEach(curso => {
                    cursoSelect.innerHTML += '<option value="' + curso.id + '">' + curso.nome + '</option>';
                });
            })
            .catch(error => {
                console.error('Erro ao carregar cursos:', error);
                cursoSelect.innerHTML = '<option selected disabled>Erro ao carregar cursos</option>';
            });
    });

    document.getElementById('curso_id').addEventListener('change', function() {
        var cursoId = this.value;
        var disciplinaSelect = document.getElementById('disciplina_id');

        // Clear existing options
        disciplinaSelect.innerHTML = '<option selected disabled>Carregando disciplinas...</option>';

        // Fetch disciplines based on selected course using AJAX
        fetch('{{ route("disciplinas_por_curso") }}?cursoId=' + cursoId)
            .then(response => response.json())
            .then(data => {
                // Populate the discipline select with fetched data
                disciplinaSelect.innerHTML = '<option selected disabled>Selecione uma disciplina</option>';
                data.forEach(disciplina => {
                    disciplinaSelect.innerHTML += '<option value="' + disciplina.id + '">' + disciplina.nome + '</option>';
                });
            })
            .catch(error => {
                console.error('Erro ao carregar disciplinas:', error);
                disciplinaSelect.innerHTML = '<option selected disabled>Erro ao carregar disciplinas</option>';
            });
    });

</script>

@include("template.footer")