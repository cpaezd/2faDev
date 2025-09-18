<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class AzureGroup extends Model
{
	protected $table = 'grupos';
	protected $fillable = [
		"id",
		"nombre",
	];

	public function otps() : BelongsToMany
	{
		return $this -> belongsToMany(AmbarOTP::class, 'grupoSoporte', 'id');
	}
}
