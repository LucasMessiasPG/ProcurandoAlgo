<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Support\Facades\Auth;

class Usuario extends Authenticatable
{

	public $primaryKey = 'id_usuario';
	protected $hidden = ['senha','remember_token'];
	public $fillable = ['nome','login','senha','id_permissao'];

	public function _login($usuario)
	{
		if (Auth::guard('ws')->validate($usuario)) {
			return true;
		} else {
			return false;
		}

	}

	public function getAuthPassword()
	{
		return $this->senha;
	}

}
