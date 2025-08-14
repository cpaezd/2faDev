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

		Schema::create("usuarios", function (Blueprint $table) {
			$table -> id();
			$table -> string("nombre");
			$table -> string("email") -> unique();
			$table -> boolean("activo") -> default(true);
		});

		Schema::create("tokens", function (Blueprint $table) {
			$table -> string("tokenId") -> primary();
			$table -> string("nombre");
			$table -> string("cliente");
			$table -> string("grupoSoporte");
			$table -> date("fechaCreacion");
		});
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('usuario');
		Schema::dropIfExists('tokens');
    }
};
