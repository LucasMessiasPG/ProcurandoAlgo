<?php

namespace App\Http\Controllers;

use App\Models\Usuario;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;

class UsuarioController extends Controller
{

	private $model = 'usuario';

	/**
	 * @param Request $request
	 * @return array
	 * @throws Exception
	 */
	public function create(Request $request)
	{
		try{


			$rules = [
				'nome'=>'required|min:3|max:20',
				'email'=>'required|email',
				'senha'=>'required|size:6|confirmed',
				'senha_confirmation'=>'required'
			];


			$validation = \Validator::make($request->all(),$rules);

			if($validation->fails())
				throw new \Exception('Required: '.implode(',',$validation->errors()->all()));

			$user = $request->all();
			$user['senha'] = \Hash::make($user['senha']);
			$user['id_permissao'] = 1;
			$user = Usuario::create($user);

			return ['status'=>'success','msg'=>'Usuario registrado','user'=>$user];
			return $this->_return('success','Usuario registrado');
		}catch (\Exception $e){
			$this->_logErro($e);
			return $this->_return('error',$e->getMessage());
		}
	}

	public function update(Request $request)
	{
		try{

			$this->validate($request,[
				'id_usuario' => 'required',
				'nome' => 'min:4|max:50',
				'login' => 'min:4|max:10',
				'senha' => 'min:6|max:10',
			]);

			$usuario = $request->all();
			$user = new Usuario();
			$user->update($usuario);
			return $this->_return('success','Usuario alterado');
		}catch (\Exception $e){
		    $this->_logErro($e);
        return $this->_return('error','Erro ao alterar usuario',['error'=>$e->getMessage()]);
		}
	}

	public function destroy($id)
	{
		try{
			$user = new Usuario();
			$user->delete($id);
			return $this->_return('success','Usuario deletado');
		}catch (\Exception $e){
			$this->_logErro($e);
			return $this->_return('error','Erro ao deletar usuario',['error'=>$e->getMessage()]);
		}
	}

	public function filter(Request $request)
	{
		try{
			$user = new Usuario();
			$filtro = $user
				->where(function($q)use($request){
					foreach ($request->all() as $key=>$filter) {
						switch ($key) {
							case 'nome':
								$q->where($key, 'ilike', "%".$filter."%");
								break;
							default:
								$q->where($key, '=', $filter);
								break;
						}
					}
				})
				->get()
				->toArray();

			return $this->_return('success','Usuario filtrado',['filtro'=>$filtro]);
		}catch (\Exception $e){
			$this->_logErro($e);
			return $this->_return('error','Erro ao filtrar usuario',['error'=>$e->getMessage()]);
		}
	}
}
