<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

Route::get('/cadastrarProduto', function(Request $request) {
    return "Under Dev";
});

Route::get('/atualizarLocalizacaoProduto/{produto_id}', function($produto_id) {
    return "Under Dev (produto_id=$produto_id)";
});

Route::get('/listarProdutos', function(Request $request) {
    return "Under Dev";
});

Route::get('/ultimaAtualizacao', function(Request $request) {
    return "Under Dev";
});
