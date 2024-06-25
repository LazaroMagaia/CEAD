<?php

namespace App\Http\Controllers;

use App\Models\Curso;
use App\Models\Faculdade;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use App\Models\Disciplina;
use App\Models\Curso_disciplina;
use App\Models\Estudante;
use App\Models\Estudante_turma;
use App\Models\Turma;
use App\Models\User;
class SettingsController extends Controller
{
    /**
     * FACULDADES
     */
    public function faculdade_index()
    {
        $data["faculdades"] = Faculdade::all();
        return view('admin.pages.settings.faculdade.index',$data);
    }
    public function faculdade_store(Request $request)
    {
        $data = request()->validate([
            'nome' => 'required|unique:faculdades,nome',
            'localizacao' => 'required',
        ]);
        $faculdade = new Faculdade();
        $faculdade::create($data);
        return redirect()->route('admin.settings.faculdade.index')->with('success','Faculdade criada com sucesso');
    }
    public function faculdade_update(Request $request, $id)
    {
        $faculdade = Faculdade::find($id);

        $data = $request->validate([
            'nome' => 'required|unique:faculdades,nome',
            Rule::unique('faculdades', 'nome')->ignore($id),
            'localizacao' => 'required',
        ]);    
        $faculdade->update($data);
        return redirect()->route('admin.settings.faculdade.index')->with('success','Faculdade atualizada com sucesso');
    }
    public function faculdade_destroy($id)
    {
        $faculdade = Faculdade::find($id);
        $faculdade->delete();
        return redirect()->route('admin.settings.faculdade.index')->with('success','Faculdade eliminada com sucesso');
    }
    /**
     * CURSOS
     */
    public function curso_index()
    {
        $data["cursos"] = Curso::all();
        $data["faculdades"] = Faculdade::all();
        return view('admin.pages.settings.cursos.index',$data);
    }
    public function curso_store(Request $request)
    {
        $data = request()->validate([
            'nome' => 'required|unique:cursos,nome',
            'duracao' => 'required',
            'faculdades_id' => 'required',
        ]);
        $curso = new Curso();
        $curso::create($data);
        return redirect()->route('admin.settings.curso.index')->with('success','Curso criado com sucesso');
    }
    public function curso_update(Request $request, $id)
    {
        $curso = Curso::find($id);

        $data = $request->validate([
            'nome' => 'required|unique:cursos,nome',
            'duracao' => 'required',
            Rule::unique('cursos', 'nome')->ignore($id),
            'faculdades_id' => 'required',
        ]);    
        $curso->update($data);
        return redirect()->route('admin.settings.curso.index')->with('success','Curso atualizado com sucesso');
    }
    public function curso_destroy($id)
    {
        $curso = Curso::find($id);
        $curso->delete();
        return redirect()->route('admin.settings.curso.index')->with('success','Curso eliminado com sucesso');
    }
    public function disciplina_index(Request $request)
    {
        $searchQuery = $request->query('search');

        if (isset($searchQuery)) {
            $data["disciplinas"] = Curso_disciplina::with('disciplina')
            ->with('curso')->where('curso_id',$searchQuery)->orderBy('ano', 'asc')->get();
            $data['filters'] =  $searchQuery;
        }else
        {
            $data["disciplinas"] = Curso_disciplina::with('disciplina')
            ->with('curso')->orderBy('ano', 'asc')->get();
        }
        $data["cursos"] = Curso::all();
        //dd($data["disciplinas"]);
        return view('admin.pages.settings.cadeiras.index',$data);
    }
    public function disciplina_store(Request $request)
    {
        // Validate incoming request data
        $data = $request->validate([
            'curso_id' => 'required|exists:cursos,id',
            'ano' => 'required|integer',
            'nome' => 'required',
            // Add more validation rules as needed
        ]);
       
        // Create a new Disciplina instance
        $disciplina = Disciplina::create([
            'nome' => $data['nome'],
        ]);

        // Create a new Curso_disciplina instance
        Curso_disciplina::create([
            'curso_id' => $data['curso_id'],
            'disciplina_id' => $disciplina->id,
            'ano' => $data['ano'],
        ]);

        return redirect()->route('admin.settings.disciplina.index')->with('success','Disciplina criada com sucesso');
    }
    public function disciplina_update(Request $request, $id)
    {
        $disciplina = Disciplina::find($id);

        $data = $request->validate([
            'curso_id' => 'required|exists:cursos,id',
            'ano' => 'required|integer',
            'nome' => 'required',
        ]);
        $disciplina->update([
            'nome' => $data['nome'],
        ]);
        Curso_disciplina::where('disciplina_id', $id)->update([
            'curso_id' => $data['curso_id'],
            'ano' => $data['ano'],
        ]);
        return redirect()->route('admin.settings.disciplina.index')->with('success','Disciplina atualizada com sucesso');
    }
    public function disciplina_destroy($id)
    {
        $disciplina = Disciplina::find($id);
        $disciplina->delete();
        return redirect()->route('admin.settings.disciplina.index')->with('success','Disciplina eliminada com sucesso');
    }
    
    public function Turma()
    {
        $data["turmas"] = Turma::all();
        $data["cursos"] = Curso::all();
        return view('admin.pages.settings.turmas.index',$data);
    }
    public function Turma_Store()
    {
        $data = request()->validate([
            'nome' =>       'required|unique:turmas,nome',
            'curso_id' =>   'required',
            'ano' =>        'required'
        ]);
        $turma = new Turma();
        $turma::create($data);
        return redirect()->route('admin.settings.turmas.index')->with('success','Turma criada com sucesso');
    }
    public function Turma_Update(Request $request,$id)
    {
            $turma = Turma::findOrFail($id);
    
            $data = $request->validate([
                'nome' => ['required', Rule::unique('turmas')->ignore($turma->id)],
                'curso_id' => 'required|exists:cursos,id',
                'ano'   => 'required'
            ]);
    
            //dd($request->all());
            $turma->update($data);
    
            return redirect()->route('admin.settings.turmas.index')
                             ->with('success', 'Turma atualizada com sucesso.');
    }
    public function Turma_Destroy(Request $request,$id)
    {
        $turma = Turma::findOrFail($id);
        $turma->delete();

        return redirect()->route('admin.settings.turmas.index')
                            ->with('success', 'Turma atualizada com sucesso.');
    }
    public function Turma_estudante(Request $request,$id)
    {
        $data["turma"] = Turma::find($id);
       // Obter todos os IDs dos estudantes
        $all_students = Estudante::all();
        $all_students_ids = $all_students->pluck('id')->toArray();

        // Obter IDs dos estudantes que já estão na turma
        $students_in_turma = Estudante_turma::where('turma_id', $id)->get();
        $data["students_in_turma_ids"] = $students_in_turma->pluck('estudante_id')->toArray();
        $data["students"] = Estudante::whereIn('id', $data["students_in_turma_ids"])->get();

        // Calcular a diferença para obter IDs dos estudantes que não estão na turma
        $data["students_not_in_turma_ids"] = array_diff($all_students_ids, $data["students_in_turma_ids"]);
      
        // Obter os estudantes que não estão na turma
        $data["students_not_in_turma"] = Estudante::whereIn('id', $data["students_not_in_turma_ids"])->get();
   

        $data["cursos"] = Curso::all();
        return view('admin.pages.settings.turmas.turma_estudante',$data);
    }
    public function Turma_estudante_Store(Request $request)
    {

        $data = request()->validate([
            'estudante_id' => 'required',
            'turma_id' => 'required',
        ]);

        $estudante_turma = new Estudante_turma();
        $estudante_turma::create($data);
        return redirect()->route('admin.settings.turmas.index')
        ->with('success','Estudante adicionado com sucesso');
    }
    public function Turma_estudante_Destroy(Request $request,$id=null)
    {
        $estudante_turma = Estudante_turma::where("estudante_id",$request->estudante_id)
        ->where("turma_id",$request->turma_id)->first();
        $estudante_turma->delete();
        return redirect()->route('admin.settings.turmas.index')
                            ->with('success', 'Estudante removido com sucesso.');
    }
}
