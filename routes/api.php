<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\{
    APIController
};
Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::get('/all_courses/{id?}', [APIController::class, 'all_courses'])
->name("all_cursos_index");
Route::get('/disciplinas_por_curso/{id?}', [APIController::class, 'all_lessions_by_course'])
->name("disciplinas_por_curso");