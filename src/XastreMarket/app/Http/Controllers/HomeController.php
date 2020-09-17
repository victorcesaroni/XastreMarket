<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $products = array(
           array("name" => "Prod1", "loc" => "Loc1"),
           array("name" => "Prod2", "loc" => "Loc2"),
           array("name" => "Prod3", "loc" => "Loc3"),
           array("name" => "Prod4", "loc" => "Loc4"),
           array("name" => "Prod5", "loc" => "Loc5"),
        );

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
        $lado = $request->input('lado');

        return "UnderDev $nome $corredor $prateleira $lado";
    }
}

