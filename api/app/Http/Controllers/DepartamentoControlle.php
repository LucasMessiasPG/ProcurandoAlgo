<?php

namespace App\Http\Controllers;

use App\Models\Departamento;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class DepartamentoControlle extends Controller
{
	private $model = 'departamento';

  public function create(Request $request)
  {
    try{

	    $this->validate($request,[
		    'nome' => 'required|min:4|max:50',
		    'descricao' => 'required|min:4|max:200',
	    ]);

	    $params = $request->all();

	    $model = new ucfirst($this->model);
	    $result = $model->create($params);
	    return $this->_return('success',ucfirst($this->model).' cadastrado',['id'=>$result->{'id_'.$this->model}]);

    }catch (\Exception $e){
	    $this->_logErro($e);
	    return $this->_return('error','Erro ao cadastrar '.$this->model,['error'=>$e->getMessage()]);
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
}
