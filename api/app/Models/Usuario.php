<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Support\Facades\Auth;

class Usuario extends Authenticatable
{

	public $primaryKey = 'id_usuario';
	protected $hidden = ['senha','remember_token'];
	public $fillable = ['id_usuario', 'nome','email','senha','id_permissao'];

	public function _login($usuario)
	{
		if (Auth::guard('ws_user')->attempt(['email'=>$usuario['email'],'password'=>$usuario['senha']])) {
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
