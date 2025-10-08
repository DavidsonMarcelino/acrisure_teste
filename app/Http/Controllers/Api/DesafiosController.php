<?php

namespace App\Http\Controllers\Api;

use App\Services\DesafiosService;
use App\Http\Requests\DesafiosRequest;
use LaravelAux\BaseController;
use Illuminate\Http\Request;

class DesafiosController extends BaseController
{
    /**
     * UserController constructor.
     *
     * @param DesafiosService $service
     * @param DesafiosRequest $request
     */
    public function __construct(DesafiosService $service)
    {
        parent::__construct($service, new DesafiosRequest);
    }

    public function getDesafio(int $desafio)
    {
        $desafios =  [
            0 => 'zero',
            1 => 'primeiro',
            2 => 'segundo',
            3 => 'terceiro',
            4 => 'quarto',
            5 => 'quinto',
            6 => 'sexto',
            7 => 'setimo',
            8 => 'oitavo',
            9 => 'nono',
        ];

        if (array_key_exists($desafio, $desafios))
        {
            return view($desafios[$desafio]);
        }

        return view('404');
    }


    public function primeiro(Request $request)
    {
        $teste = strlen(count_chars(preg_replace("/[^a-z]/", "", strtolower($request->frase)), 3));

        return $teste == 26;
    }

    public function segundo(Request $request)
    {
        return preg_replace("/[aeiouAEIOUáéíóúàèìòùâêîôûãõäëïöü]/", "", $request->frase);
    }

    public function terceiro(Request $request)
    {
        $numeros = array_filter(explode(" ", $request->numeros), 'is_numeric');

        if(count($numeros) > 1)
        {
            sort($numeros);
            
            return $numeros[0] . ' ' . $numeros[count($numeros)-1];
        }

        return response()->json(['error' => 'Por favor, digite no formato válido e utilizando espaço como separador, ex: 42 1 2 -8 -23 30'], 500);
    }

    public function quarto(Request $request)
    {
        return str_ends_with($request->frase1, $request->frase2);
    }

    public function quinto(Request $request)
    {
        $palavras = explode(' ', $request->frase);
        
        foreach($palavras as $key => $palavra)
        {
            $palavras[$key] = strrev($palavra);
        }

        return implode(' ', $palavras);
    }

    public function sexto(Request $request)
    {
        $request->frase = preg_replace("/[À-ÿ]/", "", $request->frase);

        $caracteres = array_filter(array_unique(str_split($request->frase)), function($letra) {
            return $letra != " ";
        });

        return count($caracteres) . " (" . implode(', ', $caracteres) . ")";
    }

    public function setimo(Request $request)
    {
        try{

            $array1 = json_decode($request->frase1);
            $array2 = json_decode($request->frase2);
            
            $interseccao = array_values(array_intersect($array1, $array2));
            
            return $interseccao;
        } catch(\Exception $e) {
            return response()->json(['error' => 'Por favor, digite os número utilizando a vírgula como separador, ex: 1,2,3,4,5'], 500);
        }
    }

    public function oitavo(Request $request)
    {
        return preg_replace_callback('/(.)\1*/', function($matches) {
            return $matches[1] . strlen($matches[0]);
        }, $request->frase);
    }

    public function nono(Request $request)
    {
        $abertos = 0;

        $parenteses = str_split($request->frase);

        foreach($parenteses as $key => $parentese)
        {
            if($parentese == "(")
            {
                $abertos++;
            }else
            {
                $abertos--;
            }

            if($abertos < 0)
            {
                return false;
            }
        }

        return $abertos == 0;
    }
}