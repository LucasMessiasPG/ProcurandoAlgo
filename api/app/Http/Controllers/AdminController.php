<?php

namespace App\Http\Controllers;

use App\Models\Usuario;
use Illuminate\Http\Request;

use App\Http\Requests;
use Illuminate\Support\Facades\Auth;
use Mockery\CountValidator\Exception;

class AdminController extends Controller
{
    public function login(Request $request)
    {
			try{
//				return \Hash::make('123456');
		    $this->validate($request,[
			    'email'=>'required|min:4',
			    'senha'=>'required|min:6'
		    ]);

				$usuario = new Usuario();
		    if($usuario->_login($request->all())){
			    return $this->_return('success','Login Efetuado',[
				    'user'=>
						Usuario::where('email', '=', $request->email)->first()
			    ]);
		    }else{
			    return $this->_return('warning','Credenciais invalidas');
		    }

			}catch (Exception $e){
				dd($e->getMessage());
			}
    }

	public function auth(Request $request)
	{
		try{

			$this->validate($request,[
				'login'=>'required|min:4',
				'password'=>'required|min:6'
			]);

			$usuario = new Usuario();
			if($usuario->_auth($request->all())){
				return $this->_return('success','Login Efetuado');
			}else{
				return $this->_return('warning','Credenciais invalidas');
			}

		}catch (Exception $e){
			dd($e->getMessage());
		}
	}

	public function register(Request $request)
	{
		try{

			$rules = [
				'nome'=>'required|min:3|max:20',
				'email'=>'required|email',
				'senha'=>'required|size:6|confirmed',
				'senha_confirmation','required'
			];

			$validation = \Validators::make($request->all(),$rules);

			if($validation->fails())
				throw new Exception('Required: '.implode(',',$validation->errors()->all()));

			$user = $request->all();
			$user['senha'] = \Hash::make($user['senha']);
			Usuario::create($user);

			return $this->_return('success','Usuario registrado');
		}catch (\Exception $e){
			return $this->_return('error',$e->getMessage());
		}
	}
}
