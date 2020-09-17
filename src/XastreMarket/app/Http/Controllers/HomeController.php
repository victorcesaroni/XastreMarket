<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    public function index()
    {
        /*$products = array(
           array("nome" => "Prod1", "corredor" => "A", "prateleira" => "1", "lado" => "E"),
           array("nome" => "Prod2", "corredor" => "B", "prateleira" => "2", "lado" => "D"),
           array("nome" => "Prod3", "corredor" => "C", "prateleira" => "3", "lado" => "E"),
           array("nome" => "Prod4", "corredor" => "A", "prateleira" => "4", "lado" => "D"),
           array("nome" => "Prod5", "corredor" => "B", "prateleira" => "1", "lado" => "D"),
        );*/

        $result = DB::table('cadastros')->
                    join('produtos','cadastros.produto_id','=','produtos.id')->
                    select('produtos.nome', 'cadastros.corredor', 'cadastros.prateleira', 'cadastros.lado')->
                    get();

        $products = json_decode($result, true);

        return view('home', compact('products'));
    }

    public function addproduct(Request $request)
    {
        $valid = $request->validate([
            'nome' => 'required',
            'corredor' => 'required',
            'prateleira' => 'required',
            'lado' => 'required'
        ]);
        
        $nome = $request->input('nome');
        $corredor = $request->input('corredor');
        $prateleira = $request->input('prateleira');
        $lado = $request->input('lado|in:Esquerda,Direita');

        $id = DB::table('produtos')->insertGetId([
            'nome' => $nome,
        ]);

        DB::table('cadastros')->insert([
            'produto_id' => $id,
            'corredor' => $corredor,
            'prateleira' =>  $prateleira,
            'lado' => $lado === 'Esquerda' ? "E" : "D",
        ]);

        return back()->with("msg", "id=$id UnderDev $nome $corredor $prateleira $lado");
    }
}

