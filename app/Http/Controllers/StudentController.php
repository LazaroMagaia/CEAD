<?php

namespace App\Http\Controllers;

use App\Models\Agenda;
use App\Models\Aula;
use Illuminate\Http\Request;
use App\Models\Estudante;
use App\Models\Curso;
use App\Models\Curso_disciplina;

class StudentController extends Controller
{
    public function index()
    {
        return view('student.index'); 
    } 
    public function Agenda()
    {
        $user_id = auth()->user()->id;
        $FindAgendas = [];
        $data["estudantes"] = Estudante::where("user_id",$user_id)->first();
        $data["curso"]=Curso::find($data["estudantes"]->cursos_id);
        $data["disciplinas"] = Curso_disciplina::where("curso_id",$data["estudantes"]->cursos_id)->get();

        foreach($data["disciplinas"] as $disciplina){
            $agendas = Agenda::where("disciplina_id",$disciplina->disciplina_id)->get();
            if($agendas->isNotEmpty())
            {
                foreach($agendas as $agenda)
                {
                    $FindAgendas[] = $agenda;
                }
            }
        }
        $data["agendas"] = $FindAgendas;
        return view('student.pages.agenda.index',$data); 
    }
    public function Aulas()
    {
        $user_id = auth()->user()->id;
        $data["estudantes"] = Estudante::where("user_id",$user_id)->first();
        $data["curso"]=Curso::find($data["estudantes"]->cursos_id);

        $data["aulas"] = Aula::where("curso_id",$data["estudantes"]->cursos_id)
        ->with(['disciplina', 'curso', 'tutor', 'documents'])->get();
        //dd( $data["aulas"] );
        return view('student.pages.aulas.index',$data);
    }
}
