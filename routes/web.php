<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\{
    AdminController, AgendaController, PermissionController,TutorController,StudentController,
    SettingsController,UserController,AulaController
};
Route::get('/', function () {
    return redirect()->route("login");
});

Route::middleware(['auth'])->group(function () {

    Route::group(['middleware' => ['role:admin']], function () {
        Route::get('/admin', [AdminController::class, 'index'])->name('admin.index');

        /**
         * PERMISSOES
         */
        Route::get("/admin/settings/permission", [PermissionController::class, 'index'])
        ->name('admin.permission.index');
        Route::post("/admin/settings/permission", [PermissionController::class, 'store'])
        ->name('admin.permission.store');
        Route::put("/admin/settings/permission/{id}", [PermissionController::class, 'update'])
        ->name('admin.permission.update');
        Route::delete("/admin/settings/permission/{id}", [PermissionController::class, 'destroy'])
        ->name('admin.permission.destroy');


        /**
         *  SETTINGS FACULDADS
         */
        Route::get('/admin/settings/faculdade', [SettingsController::class, 'faculdade_index'])
        ->name('admin.settings.faculdade.index');
        Route::post('/admin/settings/faculdade', [SettingsController::class, 'faculdade_store'])
        ->name('admin.settings.faculdade.store');
        Route::put('/admin/settings/faculdade/{id}', [SettingsController::class, 'faculdade_update'])
        ->name('admin.settings.faculdade.update');
        Route::delete('/admin/settings/faculdade/{id}', [SettingsController::class, 'faculdade_destroy'])
        ->name('admin.settings.faculdade.destroy');
        /**
         *  SETTINGS CURSOS
         */
        Route::get('/admin/settings/cursos', [SettingsController::class, 'curso_index'])
        ->name('admin.settings.curso.index');
        Route::post('/admin/settings/cursos', [SettingsController::class, 'curso_store'])
        ->name('admin.settings.curso.store');
        Route::put('/admin/settings/cursos/{id}', [SettingsController::class, 'curso_update'])
        ->name('admin.settings.curso.update');
        Route::delete('/admin/settings/cursos/{id}', [SettingsController::class, 'curso_destroy'])
        ->name('admin.settings.curso.destroy');
        
        /**
         *  SETTINGS DISCIPLINAS
         */
        Route::get('/admin/settings/disciplinas', [SettingsController::class, 'disciplina_index'])
        ->name('admin.settings.disciplina.index');
        Route::post('/admin/settings/disciplinas', [SettingsController::class, 'disciplina_store'])
        ->name('admin.settings.disciplina.store');
        Route::put('/admin/settings/disciplinas/{id}', [SettingsController::class, 'disciplina_update'])
        ->name('admin.settings.disciplina.update');
        Route::delete('/admin/settings/disciplinas/{id}', [SettingsController::class, 'disciplina_destroy'])
        ->name('admin.settings.disciplina.destroy');

        /**
         *  SETTINGS TURMA
         */
        Route::get('/admin/settings/turmas', [SettingsController::class, 'Turma'])
        ->name('admin.settings.turmas.index');
        Route::post('/admin/settings/turmas', [SettingsController::class, 'turma_store'])
        ->name('admin.settings.turmas.store');
        Route::put('/admin/settings/update/{id}', [SettingsController::class, 'Turma_Update'])
        ->name('admin.settings.turmas.update');
        Route::put('/admin/settings/destroy/{id}', [SettingsController::class, 'Turma_Destroy'])
        ->name('admin.settings.turmas.destroy');
        /**
         *  SETTINGS TURMA - ESTUDANTE
         */
        Route::get('/admin/settings/Turma_estudante/{id}', [SettingsController::class, 'Turma_estudante'])
        ->name('admin.settings.Turma_estudante.index');
        Route::post('/admin/settings/Turma_estudante', [SettingsController::class, 'Turma_estudante_Store'])
        ->name('admin.settings.Turma_estudante.store');
        
        Route::delete('/admin/settings/Turma_estudante_destroy', [SettingsController::class, 'Turma_estudante_Destroy'])
        ->name('admin.settings.Turma_estudante.destroy');
        /**
         * USERS ESTUDANTE
         */
        Route::get('/admin/users/estudante', [UserController::class, 'index'])
        ->name('admin.user.estudante.index');
        Route::post('/admin/users/estudante', [UserController::class, 'user_store'])
        ->name('admin.user.estudante.store');
        Route::put('/admin/users/estudante/{id}', [UserController::class, 'user_update'])
        ->name('admin.user.estudante.update');
        Route::delete('/admin/users/estudante/{id}', [UserController::class, 'user_destroy'])
        ->name('admin.user.estudante.destroy');
        
        /**
         * USERS    TUTORES
         */
        Route::get('/admin/users/tutor', [UserController::class, 'tutor_index'])
        ->name('admin.user.tutor.index');

        Route::get('/admin/users/tutor_show/{id}', [UserController::class, 'tutor_show'])
        ->name('admin.user.tutor.show');


        Route::get('/admin/users/tutor_edit/{id}', [UserController::class, 'tutor_edit'])
        ->name('admin.user.tutor.edit');

        /**
         * AGENDA TUTOR
         */
        Route::get('/admin/agenda/', [AgendaController::class, 'index'])
        ->name('admin.agenda.index');
        Route::post('/admin/agenda/store', [AgendaController::class, 'store'])
        ->name('admin.agenda.store');

        
        Route::post('/admin/users/tutor', [UserController::class, 'tutor_store'])
        ->name('admin.user.tutor.store');
        Route::put('/admin/users/tutor_update/{id}', [UserController::class, 'tutor_update'])
        ->name('admin.user.tutor_update.update');
        Route::delete('/admin/users/tutor_destroy/{id}', [UserController::class, 'tutor_destroy'])
        ->name('admin.user.tutor_destroy.destroy');
        Route::post('/admin/users/tutor_update_all/{id}', [UserController::class, 'tutor_update_all'])
        ->name('admin.user.tutor.tutor_update_all');
        Route::delete('/admin/users/show/{id}', [UserController::class, 'tutor_show_destroy'])
        ->name('admin.user.tutor.show_destroy');


        
        
    });
    
    Route::group(['middleware' => ['role:tutor']], function () {
        Route::get('/tutor', [TutorController::class, 'index'])->name('tutor.index');
        Route::get('/tutor/agenda', [TutorController::class, 'Agenda'])->name('tutor.agenda');
        Route::post('/tutor/agenda/store', [TutorController::class, 'Agenda_store'])
        ->name('tutor.agenda.store');
        Route::put('/tutor/agenda/update/{id}', [TutorController::class, 'Agenda_update'])
        ->name('tutor.agenda.update');
        Route::delete('/agenda/destroy/{id}', [TutorController::class, 'Agenda_destroy'])
        ->name('tutor.agenda.destroy');
        /**
         * AULA TUTOR
         */
        Route::get('/tutor/aula/index', [AulaController::class, 'index'])->name('tutor.aula.index');
        Route::post('/tutor/aula/store', [AulaController::class, 'store'])->name('tutor.aula.store');
        Route::put('/tutor/aula/update/{id}', [AulaController::class, 'update'])->name('tutor.aula.update');
        Route::delete('/tutor/aula/destroy/{id}', [AulaController::class, 'destroy'])->name('tutor.aula.destroy');

        
    });
    
    Route::group(['middleware' => ['role:estudante']], function () {
        Route::get('/student', [StudentController::class, 'index'])->name("student.index");
        Route::get('/student/agenda', [StudentController::class, 'Agenda'])->name("student.agenda");
        Route::get('/student/aulas', [StudentController::class, 'Aulas'])->name("student.aulas");
    });
    
});


require __DIR__.'/auth.php';
