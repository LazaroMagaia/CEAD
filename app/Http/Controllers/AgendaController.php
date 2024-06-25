<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Agenda;
use App\Models\Disciplina;
use App\Models\AgendaDocument;


class AgendaController extends Controller
{
    public function index()
    {
        $data['agendas'] = Agenda::all();
        $data["disciplinas"] = Disciplina::all();
        return view('admin.pages.agendas.index',$data);
    }
    public function store(Request $request)
    {
        $request->validate([
            'disciplina_id' => 'required|exists:disciplinas,id',
            'data_hora' => 'required|date_format:Y-m-d\TH:i',
            'assunto' => 'nullable|string|max:255',
            'informacoes_adicionais' => 'nullable|string',
            'documents.*' => 'nullable|file|mimes:pdf,doc,docx,zip',
        ]);
        $user = auth()->user();
        $user_id = null;
        if($user->role == "admin"){
            $user_id = auth()->user()->id;
        }else
        if($user->role == "tutor"){
            $user = auth()->user()->id;
        }

        $agenda = Agenda::create([
            'tutor_id' => $user_id,
            'disciplina_id' => $request->disciplina_id,
            'data_hora' => $request->data_hora,
            'assunto' => $request->assunto,
            'informacoes_adicionais' => $request->informacoes_adicionais,
        ]);

        if ($request->hasFile('documents')) {
            foreach ($request->file('documents') as $file) {
                $path = $file->store('documents', 'public');
                AgendaDocument::create([
                    'agenda_id' => $agenda->id,
                    'file_path' => $path,
                ]);
            }
        }

        return redirect()->back()->with('success', 'Sessão de tutoria agendada com sucesso.');
    } 
}
