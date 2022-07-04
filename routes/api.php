<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CidadesController;

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

/*Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('Cidades', 'ApiController@getAllCidades');
Route::get('Cidades/{id}', 'ApiController@getCidades');
Route::post('Cidades', 'ApiController@createCidades');
Route::put('Cidades/{id}', 'ApiController@updateCidades');
Route::delete('Cidades/{id}', 'ApiController@deleteCidades');

Route::get('campanhas', 'campanhasController@getAllcampanhas');
Route::get('campanhas/{id}', 'campanhasController@getcampanhas');
Route::post('campanhas', 'campanhasController@createcampanhas');
Route::put('campanhas/{id}', 'campanhasController@updatecampanhas');
Route::delete('campanhas/{id}', 'campanhasController@deletecampanhas');

Route::get('descontos', 'descontosController@getAlldescontos');
Route::get('descontos/{id}', 'descontosController@getdescontos');
Route::post('descontos', 'descontosController@createdescontos');
Route::put('descontos/{id}', 'descontosController@updatedescontos');
Route::delete('descontos/{id}', 'descontosController@deletedescontos');

Route::get('grupos_cidades', 'gruposController@getAllgrupos');
Route::get('grupos_cidades/{id}', 'gruposController@getgrupos');
Route::post('grupos_cidades', 'gruposController@creategrupos');
Route::put('grupos_cidades/{id}', 'gruposController@updategrupos');
Route::delete('grupos_cidades/{id}', 'gruposController@deletegrupos');

Route::get('produtos', 'produtosController@getAllprodutos');
Route::get('produtos/{id}', 'produtosController@getprodutos');
Route::post('produtos', 'produtosController@createprodutos');
Route::put('produtos/{id}', 'produtosController@updateprodutos');
Route::delete('produtos/{id}', 'produtosController@deleteprodutos');