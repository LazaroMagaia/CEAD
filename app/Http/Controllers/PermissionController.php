<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Permission;
use Illuminate\Validation\Rule;
class PermissionController extends Controller
{
    public function index()
    {
        $data["permissions"] = Permission::all();
        return view('admin.pages.permissions.index',$data);
    }
    public function store(Request $request)
    {
        $data = request()->validate([
            'nome' => 'required|unique:permissions,nome',
        ]);
        Permission::create($data);
        return redirect()->route('admin.permission.index')->with('success','Permissão criada com sucesso');
    }
    public function update(Request $request, $id)
    {
        $permission = Permission::find($id);

        $data = $request->validate([
            'nome' => [
                'required',
                Rule::unique('permissions', 'nome')->ignore($id),
            ],
        ]);    
        $permission->update($data);
        return redirect()->route('admin.permission.index')->with('success','Permissão atualizada com sucesso');
    }
    public function destroy($id)
    {
        $permission = Permission::find($id);
        $permission->delete();
        return redirect()->route('admin.permission.index')->with('success','Permissão deletada com sucesso');
    }
}
