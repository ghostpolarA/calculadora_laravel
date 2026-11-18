<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CalculadoraController extends Controller
{
    public function index()
    {
        return view('calculadora');
    }

    public function calcular(Request $request)
    {
        $request->validate([
            'numero1' => 'required|numeric',
            'numero2' => 'required|numeric',
            'operacion' => 'required|in:suma,resta,multiplicacion,division',
        ]);

        $numero1 = $request->numero1;
        $numero2 = $request->numero2;
        $operacion = $request->operacion;

        switch ($operacion) {

            case 'suma':
                $resultado = $numero1 + $numero2;
                break;

            case 'resta':
                $resultado = $numero1 - $numero2;
                break;

            case 'multiplicacion':
                $resultado = $numero1 * $numero2;
                break;

            case 'division':
                if ($numero2 == 0) {
                    return back()
                        ->withErrors([
                            'numero2' => 'No se puede dividir entre cero.'
                        ])
                        ->withInput();
                }

                $resultado = $numero1 / $numero2;
                break;
        }

        return view('calculadora', compact(
            'resultado',
            'numero1',
            'numero2',
            'operacion'
        ));
    }
}