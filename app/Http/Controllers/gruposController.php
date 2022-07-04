<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class gruposController extends Controller
{
    
    public function getAllgrupos(){
        $grupos = grupos::get()->toJson(JSON_PRETTY_PRINT);
        return response($grupos, 200);
      }

      public function getgrupos($id){
        if (grupos::where('id', $id)->exists()) {
            $grupos = grupos::where('id', $id)->get()->toJson(JSON_PRETTY_PRINT);
            return response($grupos, 200);
          } else {
            return response()->json([
              "message" => "grupos not found"
            ], 404);
          }
      }

      public function creategrupos(Request $request) {
        $grupos = new grupos;
        $grupos->nome = $request->nome;
        $grupos->save();

        return response()->json(
            [
                "message" => "Cadastrado com sucesso!"
            ], 201
        );
      }
      public function updatecampanhas(Request $request, $id){
        if (campanhas::where('id', $id)->exists()) {
            $campanhas = campanhas::find($id);
            $campanhas->nome = is_null($request->nome) ? $campanhas->nome : $request->nome;
            $campanhas->save();
    
            return response()->json([
                "message" => "records updated successfully"
            ], 200);
            } else {
            return response()->json([
                "message" => "campanhas not found"
            ], 404);
            
        }
      } 
    
      public function deletecampanhas($id){
        if(campanhas::where('id', $id)->exists()) {
            $campanhas = campanhas::find($id);
            $campanhas->delete();
    
            return response()->json([
              "message" => "records deleted"
            ], 202);
          } else {
            return response()->json([
              "message" => "campanhas not found"
            ], 404);
          }
    }
}
