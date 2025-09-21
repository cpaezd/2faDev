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
			$table -> string("cliente"); // TODO: Buscar otra idea para añadir más de un grupo
			$table -> date("fechaCreacion");
			$table -> date("fechaModificacion");
			$table -> text("observaciones") -> nullable();
			$table -> boolean("activo");
		});

		Schema::create("grupos", function (Blueprint $table) {
			$table -> uuid("id") -> primary();
			$table -> string("nombre");
		});

		Schema::create("otp_grupos", function (Blueprint $table) {
			$table -> integer("otp");
			$table -> uuid("grupo");

			$table -> primary(["otp", "grupo"]);

			$table 
				-> foreign("otp") 
				-> references("id") 
				-> on("otp");
			$table 
				-> foreign("grupo") 
				-> references("id") 
				-> on("grupos");
		});
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
		Schema::dropDatabaseIfExists(env("DB_DATABASE"));
    }
};
