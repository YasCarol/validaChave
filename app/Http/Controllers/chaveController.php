<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use PhpParser\Node\Expr\AssignOp\Mul;

class chaveController extends Controller
{
    public function validaChave(Request $request)
    {
        $chave = $request->all();
        $chave = implode($chave);
        $mult = array(2, 3, 4, 5, 6, 7, 8, 9);
        $soma = 0;
        $cont = 0;
        $a = -2;
        if (strlen($chave) < 44) {
            return  ['status'=>false, 'mensagem'=> "CHAVE INCOMPLETA"];;
        }
        while ($cont < strlen($chave)) {
            foreach ($mult as $v) {
                if ($a == -45) {
                    break;
                }
                $multiplica = $v * $chave[$a];
                $soma += +$multiplica;
                $a--;
            }
            $cont++;
        }
        $dv = substr($chave, -1);
        $resto = $soma % 11;
        $div = 11 - $resto;
        if($div == $dv){
            $retorno = ['status'=>true, 'mensagem'=> "CHAVE VALIDA"];
        }else{
            $retorno =['status'=>true, 'mensagem'=> "CHAVE INVALIDA"];
        }
        return $retorno;
    }
}
