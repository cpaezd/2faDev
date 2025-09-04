<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AmbarOTP extends Model
{
    protected $table = "otp";
	protected $fillable = [
		"nombre",
		"codigo",
		"cliente",
		"grupo",
		"activo",
	];
	protected $attributes = [
		"activo" => true,
	];
	public const CREATED_AT = "fechaCreacion";
	public const UPDATED_AT = "fechaModificacion";
}
