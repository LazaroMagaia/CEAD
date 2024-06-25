<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('aula_documents', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('aula_id');
            $table->string('file_path');
            $table->timestamps();
            $table->foreign('aula_id')->references('id')->on('aulas')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('aula_documents');
    }
};
