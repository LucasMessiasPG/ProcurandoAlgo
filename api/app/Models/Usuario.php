<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Support\Facades\Auth;

class Usuario extends Authenticatable
{

	public $primaryKey = 'id_usuario';
	protected $hidden = ['senha','remember_token'];
	protected $guard = 'ws_user';
	public $fillable = ['id_usuario', 'nome','email','senha','id_permissao'];

	public function _login($usuario)
	{
		if (Auth::attempt(['email'=>$usuario['email'],'password'=>$usuario['senha']])) {
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
