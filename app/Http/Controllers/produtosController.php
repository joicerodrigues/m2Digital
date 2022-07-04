<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class produtosController extends Controller
{
    
    public function getAllprodutos(){
        $produtos = produtos::get()->toJson(JSON_PRETTY_PRINT);
        return response($produtos, 200);
      }

      public function getprodutos($id){
        if (produtos::where('id', $id)->exists()) {
            $produtos = produtos::where('id', $id)->get()->toJson(JSON_PRETTY_PRINT);
            return response($produtos, 200);
          } else {
            return response()->json([
              "message" => "produtos not found"
            ], 404);
          }
      }

      public function createprodutos(Request $request) {
        $produtos = new produtos;
        $produtos->nome = $request->nome;
        $produtos->preco = $request->preco;
        $produtos->save();

        return response()->json(
            [
                "message" => "Cadastrado com sucesso!"
            ], 201
        );
      }

      public function updateprodutos(Request $request, $id){
        if (produtos::where('id', $id)->exists()) {
            $produtos = produtos::find($id);
            $produtos->nome = is_null($request->nome) ? $produtos->nome : $request->nome;
            $produtos->preco = is_null($request->preco) ? $produtos->preco : $request->preco;
            $produtos->save();
    
            return response()->json([
                "message" => "records updated successfully"
            ], 200);
            } else {
            return response()->json([
                "message" => "produtos not found"
            ], 404);
            
        }
    }

    public function deleteprodutos($id){
        if(produtos::where('id', $id)->exists()) {
            $produtos = produtos::find($id);
            $produtos->delete();
    
            return response()->json([
              "message" => "records deleted"
            ], 202);
          } else {
            return response()->json([
              "message" => "produtos not found"
            ], 404);
          }
    }
}
