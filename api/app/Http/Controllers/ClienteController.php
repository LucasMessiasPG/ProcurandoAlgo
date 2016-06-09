<?php

namespace App\Http\Controllers;

use App\Models\Cliente;
use Illuminate\Http\Request;

use App\Http\Requests;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class ClienteController extends Controller
{
    public function login(Request $request)
    {
        try{
            $this->validate($request,[
                'email'=>'required|min:4',
                'senha'=>'required|min:6'
            ]);

            $cliente = new Cliente();
            if($cliente->_login($request->all())){
                return $this->_return('success','Login Efetuado',[
                    'user'=>[
                        'nome'=>Auth::user()->nome,
                        'email'=>Auth::user()->email,
                        'id_cliente'=>Auth::user()->id_cliente
                    ]
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

            $cliente = new Cliente();
            if($cliente->_auth($request->all())){
                return $this->_return('success','Login Efetuado');
            }else{
                return $this->_return('warning','Credenciais invalidas');
            }

        }catch (Exception $e){
            dd($e->getMessage());
        }
    }

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
            
            $user = Cliente::create($user);

            return ['status'=>'success','msg'=>'Cliente registrado','user'=>$user];
        }catch (\Exception $e){
            return $this->_return('error',$e->getMessage());
        }
    }

    public function listar(Request $request) {
        try {
            $clientes = Cliente::select([
                'clientes.*',
                DB::raw('count(pedidos.*) as qt_pedidos')
            ])
                ->leftJoin('pedidos', 'pedidos.id_cliente', '=', 'clientes.id_cliente')
                ->groupBy('clientes.id_cliente')
                ->get();
            
            return $this->_return(true, 'pedidos listados.', ['clientes' => $clientes]);
        } catch (\Exception $e) {
            return $this->_return('error','Erro ao listar clientes.',['error'=>$e->getMessage()]);
        }
    }
}
