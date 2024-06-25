<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Curso;
use App\Models\Disciplina;
use App\Models\Faculdade;
use App\Models\Tutor;
use App\Models\Tutor_Curso;
use App\Models\Tutor_Disciplina;
use Illuminate\Validation\Rule;
class UserController extends Controller
{
    public function index()
    {
        $data["estudantes"] = User::where("role","estudante")->with('estudante')->get();
        $data["cursos"] = Curso::all();
        return view('admin.pages.users.index',$data);
    }
    public function user_store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users,email',
            'cursos_id' => 'required',
        ]);
        $password = bin2hex(random_bytes(8));
        //dd($password);
        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = bcrypt($password);
        $user->role = "estudante";
        $user->save();
        $user->estudante()->create([
            'cursos_id' => $request->cursos_id,
            'contacto' => $request->contacto,
            'primeira_senha' => $password
        ]);
        return redirect()->route('admin.user.estudante.index')->with('success','Estudante criado com sucesso');
    }
    public function user_update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required',
            'cursos_id' => 'required',
            Rule::unique('users')->ignore($id),
        ]);
        $user = User::find($id);
        $user->name = $request->name;
        $user->email = $request->email;
        $user->save();
        $user->estudante->cursos_id = $request->cursos_id;
        $user->estudante->contacto = $request->contacto;
        $user->estudante->save();
        return redirect()->route('admin.user.estudante.index')->with('success','Estudante actualizado com sucesso');
    }
    public function user_destroy($id)
    {
        $user = User::find($id);
        $user->estudante()->delete();
        $user->delete();
        return redirect()->route('admin.user.estudante.index')->with('success','Estudante deletado com sucesso');
    }

    public function tutor_index()
    {
        $data["tutores"] = User::where("role","tutor")->with('tutor')->get();
        $data["faculdades"] = Faculdade::all();
        $data["cursos"] = Curso::all();
        $data["disciplinas"] = Disciplina::all();

        return view('admin.pages.users.tutor_index',$data);
    }
    public function tutor_show($id)
    {
        $data["user"] = User::where("role","tutor")->with('tutor')->find($id);
        $data["tutor"] = Tutor::find($data["user"]->tutor->id);
        $data["tutor_disciplinas"] = Tutor_Disciplina::where('tutor_id',$data["tutor"]->id)->get();
        //dd($data["tutor_cursos"]);
        $data["faculdades"] = Faculdade::all();
        $data["cursos"] = Curso::all();
        $data["disciplinas"] = Disciplina::all();
        return view('admin.pages.users.tutor_show',$data);
    }

    public function tutor_show_destroy($id)
    {
        $data["tutor_disciplinas"] = Tutor_Disciplina::where("id",$id)->first();
        $data["tutor_disciplinas"]->delete();

        return redirect()->route('admin.user.tutor.index')->with('success','Disciplina deletada com sucesso');
    }

    public function tutor_store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users,email',
            'nivel_academico' => 'required',
            'certificado' => 'nullable|mimes:jpg,png,pdf,doc|max:2048',
        ]);

        $password = bin2hex(random_bytes(8));
        //dd($password);
        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = bcrypt($password);
        $user->role = "tutor";
        $user->save();

        // Enviando imagens para o banco de dados
        if ($request->hasFile('certificado')) {
            $file = $request->file('certificado');
            $filePath = $file->store('certificates', 'public');
        } else {
            $filePath = null;
        }
        // criando tutor com os dados
        $user->tutor()->create([
            'nivel_academico' => $request->nivel_academico,
            'contacto' => $request->contacto,
            'primeira_senha' => $password,
            'especialidade' => $request->especialidade,
            'certificado'  => $filePath, 
        ]);
        return redirect()->route('admin.user.tutor.index')->with('success','Tutor criado com sucesso');
    }

    public function tutor_update(Request $request,$id)
    {
        $request->validate([
            'name' => 'required',
            'nivel_academico' => 'required',
            Rule::unique('users')->ignore($id),
        ]);
        $user = User::find($id);
        $user->name = $request->name;
        $user->email = $request->email;
        $user->save();

        if ($request->hasFile('certificado')) {
            $file = $request->file('certificado');
            $filePath = $file->store('certificates', 'public');
    
            // Optionally, delete the old file if it exists
            if ($user->tutor->certificado) {
                Storage::disk('public')->delete($user->tutor->certificado);
            }
    
            // Update the tutor profile with the new file path
            $user->tutor->update([
                'nivel_academico' => $request->nivel_academico,
                'contacto' => $request->contacto,
                'especialidade' => $request->especialidade,
                'certificado' => $filePath,
            ]);
        } else {
            // Update the tutor profile without changing the file
            $user->tutor->update([
                'nivel_academico' => $request->nivel_academico,
                'contacto' => $request->contacto,
                'especialidade' => $request->especialidade,
            ]);
        }
        $user->tutor->save();
        
        return redirect()->route('admin.user.tutor.index')->with('success','Estudante actualizado com sucesso');
    }

    public function tutor_update_all(Request $request,$id)
    {
        $request->validate([
            'faculdade_id' => 'required',
            'curso_id' => 'required',
            'disciplina_id'=> 'required',
        ]);

        $tutor_disciplina_verificar = Tutor_Disciplina::where('tutor_id',$id)
        ->where('faculdade_id',$request->faculdade_id)
        ->where('disciplina_id',$request->disciplina_id)->first();;

        if(!$tutor_disciplina_verificar)
        {
            Tutor_Disciplina::create([
                'disciplina_id' => $request->disciplina_id,
                'faculdade_id' => $request->faculdade_id,
                'tutor_id' => $id,
                'curso_id' => $request->curso_id,
            ]);
        }else{
            $tutor_disciplina_verificar->update([
                'disciplina_id' => $request->disciplina_id,
                'faculdade_id' => $request->faculdade_id,
                'tutor_id' => $id,
                'curso_id' => $request->curso_id,
            ]);
        }
        return redirect()->route('admin.user.tutor.index')->with('success','Tutor actualizado com sucesso');
    }

    public function tutor_destroy($id)
    {
        $user = User::find($id);
        $user->tutor()->delete();
        $user->delete();
        return redirect()->route('admin.user.tutor.index')->with('success','Tutor deletado com sucesso');
    }

}
