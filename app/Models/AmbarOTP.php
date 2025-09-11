<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AmbarOTP extends Model
{
    protected $table = "otp";
	public $incrementing = true;
	
	protected $fillable = [
		"nombre",
		"cliente",
		"grupoSoporte",
		"activo",
	];

	protected $attributes = [
		"activo" => true,
	];

	public const CREATED_AT = "fechaCreacion";
	public const UPDATED_AT = "fechaModificacion";
}
