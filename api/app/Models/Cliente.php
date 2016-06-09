<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Support\Facades\Auth;

class Cliente extends Authenticatable
{
    public $primaryKey = 'id_cliente';
    
    protected $fillable = [
        'nome',
        'email',
        'login',
        'senha',
        'remember_token'
    ];

    protected $hidden = [
        'senha',
        'remember_token'
    ];

    public function _login($cliente)
    {
        if (Auth::attempt(['email'=>$cliente['email'],'password'=>$cliente['senha']])) {
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
