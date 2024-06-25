<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Agenda;
use App\Models\Disciplina;
use App\Models\Tutor_Disciplina;
use App\Models\AgendaDocument;
use Illuminate\Support\Facades\Storage;

class TutorController extends Controller
{
    public function index()
    {
        return view('tutor.index');
    } 
    public function Agenda()
    {  $disciplinas= [];
        $tutor = auth()->user()->tutor;
        $tutor_id = auth()->user()->tutor->id;
        $data['agendas'] = Agenda::where('tutor_id',$tutor_id)->get();
        $data["disciplina"] = Tutor_Disciplina::where('tutor_id',$tutor_id)->get();
        foreach($data["disciplina"] as $disciplina){
            $disciplinas[] = Disciplina::find($disciplina->disciplina_id);
        }
        $data["disciplinas"] = $disciplinas;
        $data["tutor"] =$tutor;
        return view('tutor.pages.agendas.index',$data);
    }
    public function Agenda_store(Request $request)
    {
        $request->validate([
            'disciplina_id' => 'required|exists:disciplinas,id',
            'data_hora' => 'required|date_format:Y-m-d\TH:i',
            'assunto' => 'nullable|string|max:255',
            'informacoes_adicionais' => 'nullable|string',
            'documents.*' => 'nullable|file|mimes:pdf,doc,docx,zip',
        ]);

        $user_id = auth()->user()->tutor->id;

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
    public function Agenda_update(Request $request, $id)
    {
        $request->validate([
            'disciplina_id' => 'required|exists:disciplinas,id',
            'data_hora' => 'required|date_format:Y-m-d\TH:i',
            'assunto' => 'nullable|string|max:255',
            'informacoes_adicionais' => 'nullable|string',
            'documents.*' => 'nullable|file|mimes:pdf,doc,docx,zip',
        ]);
    
        $user_id = auth()->user()->tutor->id;
    
        // Find the existing agenda record
        $agenda = Agenda::findOrFail($id);
    
        // Update the agenda record
        $agenda->update([
            'tutor_id' => $user_id,
            'disciplina_id' => $request->disciplina_id,
            'data_hora' => $request->data_hora,
            'assunto' => $request->assunto,
            'informacoes_adicionais' => $request->informacoes_adicionais,
        ]);
    
        // Handle document uploads
        if ($request->hasFile('documents')) {
            // Optional: Delete existing documents if you want to replace them
            foreach ($agenda->documents as $document) {
                Storage::disk('public')->delete($document->file_path);
                $document->delete();
            }
    
            foreach ($request->file('documents') as $file) {
                $path = $file->store('documents', 'public');
                AgendaDocument::create([
                    'agenda_id' => $agenda->id,
                    'file_path' => $path,
                ]);
            }
        }
    
        return redirect()->back()->with('success', 'Sessão de tutoria atualizada com sucesso.');
    }

    public function Agenda_destroy($id)
    {
        $agenda = Agenda::findOrFail($id);

        // Optional: Delete associated documents
        foreach ($agenda->documents as $document) {
            Storage::disk('public')->delete($document->file_path);
            $document->delete();
        }

        $agenda->delete();

        return redirect()->back()->with('success', 'Sessão de tutoria excluída com sucesso.');
    }
}
