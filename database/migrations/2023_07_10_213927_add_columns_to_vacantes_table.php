<?php

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('vacantes', function (Blueprint $table) {
            $table->string('titulo');
            $table->foreignId('salario_id')->constrained()->onDelete('cascade');
            $table->foreignId('categoria_id')->constrained()->onDelete('cascade');
            $table->string('empresa');
            $table->date('ultimo_dia');
            $table->text('descripcion');
            $table->string('imagen');
            $table->tinyInteger('publicado')->default(1);
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('vacantes', function (Blueprint $table) {
            // Al crear foreingIds, si se quiere hacer un rollback a la migracion es necesario primero eliminar las llaves
            // foraneas que se crean al generar las relaciones.
            DB::statement('SET FOREIGN_KEY_CHECKS=0;');
            $table->dropForeign(['categoria_id']);
            $table->dropColumn('categoria_id');

            DB::statement('SET FOREIGN_KEY_CHECKS=0;');
            $table->dropForeign(['salario_id']);
            $table->dropColumn('salario_id');

            DB::statement('SET FOREIGN_KEY_CHECKS=0;');
            $table->dropForeign(['user_id']);
            $table->dropColumn('user_id');
            DB::statement('SET FOREIGN_KEY_CHECKS=1;');

            $table->dropColumn('titulo');
            $table->dropColumn('empresa');
            $table->dropColumn('ultimo_dia');
            $table->dropColumn('descripcion');
            $table->dropColumn('imagen');
            $table->dropColumn('publicado');
        });
    }
};
