<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TwoFaToken extends Model
{
    protected $table = "tokens";
	protected $fillable = [
		"nombre",
		"cliente",
		"grupoSoporte",
		"fechaCreacion"
	];
	
	public const CREATED_AT = "fechaCreacion";
}
