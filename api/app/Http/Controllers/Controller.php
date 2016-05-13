<?php

namespace App\Http\Controllers;

use App\Models\Log;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Support\Facades\Auth;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function _return($status,$msg,array $opcional = null){
        if(isset($opcional)) {
            return ['status' => $status, 'msg' => $msg, array_keys($opcional)[0] => array_values($opcional)[0]];
        }else{
            return ['status' => $status, 'msg' => $msg];
        }
    }

    public function _log($msg)
    {
        $log['descricao'] = $msg;
        $log['id_usuario'] = Auth::user()->id_usuario;
        $l = new Log();
        $l->create($log);
    }

    public function _logErro($e)
    {
        $log['descricao'] = "Error: ".$e->getMessage().'; Linha: '.$e->getLine().'; File: '.$e->getFile();
        $log['id_usuario'] =  1;//Auth::user()->id_usuario;
//        $l = new Log();
//        $l->create($log);
    }
}
