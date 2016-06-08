<?php

namespace App\Http\Controllers;

use App\Models\PedidoProduto;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class PedidoProdutoController extends Controller
{

	private $model = 'pedido_produto';

	public function create(Request $request)
	{
		try{

			$this->validate($request,[
				'id_produto' => 'required',
				'id_pedido' => 'required',
			]);

			$params = $request->all();

			$model = new PedidoProduto();

			$result = $model->create($params);
			return $this->_return('success',ucfirst($this->model).' cadastrado',['id'=>$result->{'id_'.$this->model}]);

		}catch (\Exception $e){
			$this->_logErro($e);
			return $this->_return('error','Erro ao cadastrar '.$this->model,['error'=>$e->getMessage()]);
		}
	}

	public function update(Request $request)
	{
		try{

			$this->validate($request,[
				'id_deparatamento' => 'required',
				'nome' => 'min:4|max:50',
				'descricao' => 'min:4|max:200',
			]);

			$params = $request->all();
			$model = new ucfirst($this->model);
			$model->update($params);
			return $this->_return('success',ucfirst($this->model).' alterado');
		}catch (\Exception $e){
			$this->_logErro($e);
			return $this->_return('error','Erro ao alterar '.$this->model,['error'=>$e->getMessage()]);
		}
	}

	public function filter(Request $request)
	{
		try{
			$model = new ucfirst($this->model);
			$filtro = $model
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

			return $this->_return('success',ucfirst($this->model).' filtrado',['filtro'=>$filtro]);
		}catch (\Exception $e){
			$this->_logErro($e);
			return $this->_return('error','Erro ao filtrar '.$this->model,['error'=>$e->getMessage()]);
		}
	}

	public function destroy($id)
	{
		try{
			$model = new ucfirst($this->model);
			$model->delete($id);
			return $this->_return('success',ucfirst($this->model).' deletado');
		}catch (\Exception $e){
			$this->_logErro($e);
			return $this->_return('error','Erro ao deletar '.$this->model,['error'=>$e->getMessage()]);
		}
	}
}
