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
		Schema::create("otp", function (Blueprint $table) {
			$table -> integer("id") -> primary() -> autoIncrement();
			// $table -> string("codigo"); // Sería necesario??
			$table -> string("nombre") -> unique();
			$table -> string("cliente");
			$table -> string("grupoSoporte"); // TODO: Buscar otra idea para añadir más de un grupo
			$table -> date("fechaCreacion");
			$table -> date("fechaModificacion");
			$table -> text("observaciones") -> nullable();
			$table -> boolean("activo");
		});
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
		Schema::dropIfExists("otp");
    }
};
