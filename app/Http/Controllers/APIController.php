<?php

namespace App\Http\Controllers;

use App\Models\Curso;
use App\Models\Curso_disciplina;
use Illuminate\Http\Request;

class APIController extends Controller
{
    public function all_courses(Request $request,$id = null)
    {
        if ($id == null) {
            $cursos = Curso::where("faculdades_id", $request->query('faculdadeId'))->get();
            return response()->json($cursos);
        } else {
            $cursos = Curso::where("faculdades_id",$id);
            return response()->json($cursos);
        }
    }
    public function all_lessions_by_course(Request $request,$id = null){
        $all_disciplina = [];
        if ($id == null) {
            $disciplinas = Curso_disciplina::where("curso_id", $request->query('cursoId'))
            ->with('disciplina')->get();
            foreach ($disciplinas as $disciplina) {
               $all_disciplina[] = $disciplina->disciplina;
            }
            //dd($all_disciplina);
            return response()->json($all_disciplina);
        } else {
            $disciplinas = Curso_disciplina::where("curso_id", $request->query('cursoId'))
            ->with('disciplina')->get();
            return response()->json($disciplinas);
        }
    }

}
