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
        Schema::create('historico', function (Blueprint $table) {
            $table->id();
        // usuario id = quem foi promovido - foreign key
            $table->unsignedBigInteger('usuario_id');
            $table->foreign('usuario_id')->references('id')->on('usuarios');
        // promovido_por = quem promoveu - foreign key
            $table->unsignedBigInteger('promovido_por');
            $table->foreign('promovido_por')->references('id')->on('usuarios');
            // old_cargo = cargo antigo
            $table->unsignedBigInteger('old_cargo');
            $table->foreign('old_cargo')->references('id')->on('cargos');
            // new_cargo = cargo novo
            $table->unsignedBigInteger('new_cargo');
            $table->foreign('new_cargo')->references('id')->on('cargos');
            // motivo
            $table->string('motivo');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('historico');
    }
};
