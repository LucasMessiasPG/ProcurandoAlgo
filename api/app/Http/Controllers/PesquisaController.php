<?php

namespace App\Http\Controllers;

use App\Models\Departamento;
use App\Models\Produto;
use App\Models\ProdutoDepartamento;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class PesquisaController extends Controller
{
    public function filter(Request $request)
    {

	    if(isset($request->id_departamento)) {
		    $prod_dep = new ProdutoDepartamento();
		    $produtos = $prod_dep
			    ->select('produtos.*')
			    ->join('produtos', 'produtos.id_produto', '=', 'produto_departamentos.id_produto')
			    ->where('id_departamento', '=', $request->id_departamento)
			    ->get()->toArray();

		    return $produtos;
	    }
	    $campos['produtos'] =[
		    'nome'=>['texto'],
		    'descricao'=>['texto'],
		    'valor_unitario'=>['valor'],
		    'id_marca'=>['id'],
	    ];

	    $campos['departamento'] =[
		    'nome'=>['texto'],
		    'descricao'=>['texto'],
		    'id_departamento'=>['id'],
	    ];

	    $result = Produto::where(function($q) use($campos,$request){
		    foreach ($request->all() as $post) {
			    if(is_string($post)){
				    foreach ($campos['produtos'] as $produto => $tipo) {
					    foreach ($tipo as $item) {
						    if($item == 'texto'){
							    $q->orWhere($produto,'ilike','%'.$post.'%');
						    }
					    }
				    }
			    }
		    }
	    })->get()->toArray();

	    return $result;
    }

	public function filterPromocao(Request $request)
	{
		if(isset($request->id_departamento)) {
			$prod_dep = new ProdutoDepartamento();
			$produtos = $prod_dep
				->select('produtos.*')
				->join('produtos', 'produtos.id_produto', '=', 'produto_departamentos.id_produto')
				->where('id_departamento', '=', $request->id_departamento)
				->take(10)
				->get()->toArray();

			return $produtos;
		}
		$campos['produtos'] =[
			'nome'=>['texto'],
			'descricao'=>['texto'],
			'valor_unitario'=>['valor'],
			'id_marca'=>['id'],
		];

		$result = Produto::
			where('produtos.promocao','=',true)
			->where(function($q) use($campos,$request){
				foreach ($request->all() as $post) {
					if(is_string($post)){
						foreach ($campos['produtos'] as $produto => $tipo) {
							foreach ($tipo as $item) {
								if($item == 'texto'){
									$q->orWhere($produto,'ilike','%'.$post.'%');
								}
							}
						}
					}
				}
			})
			->take(8)
			->orderBy(\DB::raw('RANDOM()'))
			->get()->toArray();

		return $result;
	}

	public function filterDestaque(Request $request)
	{
		if(isset($request->id_departamento)) {
			$prod_dep = new ProdutoDepartamento();
			$produtos = $prod_dep
				->select('produtos.*')
				->join('produtos', 'produtos.id_produto', '=', 'produto_departamentos.id_produto')
				->where('id_departamento', '=', $request->id_departamento)
				->take(10)
				->get()->toArray();

			return $produtos;
		}
		$campos['produtos'] =[
			'nome'=>['texto'],
			'descricao'=>['texto'],
			'valor_unitario'=>['valor'],
			'id_marca'=>['id'],
		];

		$result = Produto::
		where('produtos.destaque','=',true)
			->where(function($q) use($campos,$request){
				foreach ($request->all() as $post) {
					if(is_string($post)){
						foreach ($campos['produtos'] as $produto => $tipo) {
							foreach ($tipo as $item) {
								if($item == 'texto'){
									$q->orWhere($produto,'ilike','%'.$post.'%');
								}
							}
						}
					}else{

					}
				}
			})
			->take(8)
			->orderBy(\DB::raw('RANDOM()'))
			->get()->toArray();

		return $result;
	}

	public function filterProduto(Request $request)
	{
		$result = Produto::
			where(function($q) use($request){
				foreach ($request->all() as $key => $post) {
					$q->Where($key,'=',$post);
				}
			})->get()->toArray();

		return $result;
	}
}
