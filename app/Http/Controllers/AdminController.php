<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Curso;
class AdminController extends Controller
{
    public function index()
    {
        return view('admin.pages.index');
    }
    
}
