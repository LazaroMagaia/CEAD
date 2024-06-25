<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Aula;
use App\Models\AulaDocument;
use App\Models\Disciplina;
use App\Models\Curso;
use App\Models\Tutor;
use App\Models\Tutor_Disciplina;

class AulaController extends Controller
{
    
    public function index()
    {
        $disciplinas= [];
        $cursos = [];
        $tutor = auth()->user()->tutor;
        $tutor_id = auth()->user()->tutor->id;

        $data["disciplina"] = Tutor_Disciplina::where('tutor_id',$tutor_id)->get();
        foreach($data["disciplina"] as $disciplina){
            $disciplinas[] = Disciplina::find($disciplina->disciplina_id);
            $cursos[] = Curso::find($disciplina->curso_id);
        }
        $data["disciplinas"] = $disciplinas;
        $data["tutores"] =$tutor;
        $data["cursos"] = $cursos;
        $data["aulas"] = Aula::with(['disciplina', 'curso', 'tutor', 'documents'])
        ->orderByDesc('created_at')
        ->get();
        return view('tutor.pages.aulas.index',$data);
    }

    public function store(Request $request)
    {
        $request->validate([
            'disciplina_id' => 'required|exists:disciplinas,id',
            'curso_id' => 'required|exists:cursos,id',
            'titulo' => 'required|string|max:255',
            'descricao' => 'nullable|string',
            'link' => 'nullable|url',
            'documents.*' => 'nullable|file|mimes:pdf,doc,docx,zip',
        ]);
        $tutor_id = auth()->user()->tutor->id;
        $aula = Aula::create([
            'disciplina_id' => $request->disciplina_id,
            'curso_id' => $request->curso_id,
            'tutor_id' => $tutor_id,
            'titulo' => $request->titulo,
            'descricao' => $request->descricao,
            'link' => $request->link,
        ]);

        if ($request->hasFile('documents')) {
            foreach ($request->file('documents') as $file) {
                $path = $file->store('aula_documents', 'public');
                AulaDocument::create([
                    'aula_id' => $aula->id,
                    'file_path' => $path,
                ]);
            }
        }

        return redirect()->back()->with('success', 'Aula criada com sucesso.');
    }
    public function update(Request $request, $id)
    {
        $request->validate([
            'disciplina_id' => 'required|exists:disciplinas,id',
            'curso_id' => 'required|exists:cursos,id',
            'titulo' => 'required|string|max:255',
            'descricao' => 'nullable|string',
            'link' => 'nullable|url',
            'documents.*' => 'nullable|file|mimes:pdf,doc,docx,zip',
        ]);

        $aula = Aula::findOrFail($id);

        // Check if the authenticated user is the tutor who created the aula
        if ($aula->tutor_id !== auth()->user()->tutor->id) {
            abort(403, 'Unauthorized action.');
        }

        $aula->update([
            'disciplina_id' => $request->disciplina_id,
            'curso_id' => $request->curso_id,
            'titulo' => $request->titulo,
            'descricao' => $request->descricao,
            'link' => $request->link,
        ]);

        // Handle document updates or additions
        if ($request->hasFile('documents')) {
            foreach ($request->file('documents') as $file) {
                $path = $file->store('aula_documents', 'public');
                AulaDocument::create([
                    'aula_id' => $aula->id,
                    'file_path' => $path,
                ]);
            }
        }

        return redirect()->back()->with('success', 'Aula atualizada com sucesso.');
    }

    public function destroy($id)
    {
        $aula = Aula::findOrFail($id);

        // Check if the authenticated user is the tutor who created the aula
        if ($aula->tutor_id !== auth()->user()->tutor->id) {
            abort(403, 'Unauthorized action.');
        }

        // Delete associated documents
        AulaDocument::where('aula_id', $aula->id)->delete();

        // Delete the aula
        $aula->delete();

        return redirect()->back()->with('success', 'Aula deletada com sucesso.');
    }
}
