<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User;
use Illuminate\Support\Facades\Auth;

class Cliente extends User
{
    public $primaryKey = 'id_cliente';
    
    protected $fillable = [
        'nome',
        'email',
        'login'
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
