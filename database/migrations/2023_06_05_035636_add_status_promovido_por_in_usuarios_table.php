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
        Schema::table('usuarios', function (Blueprint $table) {
            // status is a number that represents the user status
            // 0 = banned
            // 1 = active
            // 2 = inactive
            $table->tinyInteger('status')->default(1);
            $table->unsignedBigInteger('promovido_por')->nullable();
            $table->foreign('promovido_por')->references('id')->on('usuarios');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('usuarios', function (Blueprint $table) {
            $table->dropColumn('status');
            $table->dropForeign('usuarios_promovido_por_foreign');
            $table->dropColumn('promovido_por');
        });
    }
};
