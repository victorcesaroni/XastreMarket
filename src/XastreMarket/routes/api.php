<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\DB;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/listar-produtos', function(Request $request) {
    $result = DB::table('cadastros')->
                join('produtos','cadastros.produto_id','=','produtos.id')->
                select('produtos.id AS produto_id', 'produtos.nome AS nome', 'cadastros.corredor AS corredor', 'cadastros.prateleira AS prateleira', 'cadastros.lado AS lado')->
                get();

    return $result;
})->name('api.listarProdutos');

Route::get('/ultima-atualizacao', function(Request $request) {
    $result = DB::table('xastremarket')->
                select('configuracao', 'valor')->get();
    
    $xastremarket = json_decode($result, true);

    foreach ($xastremarket as $row)
    {
        if ($row['configuracao'] === 'versao_produtos')
            return array("ultima_atualizacao" => (int)$row['valor']);
    }

    return array("ultima_atualizacao" => -1);
})->name('api.ultimaAtualizacao');
