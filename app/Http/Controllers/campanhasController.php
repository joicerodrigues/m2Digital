<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class campanhasController extends Controller
{
    public function getAllcampanhas(){
        $campanhas = campanhas::get()->toJson(JSON_PRETTY_PRINT);
        return response($campanhas, 200);
      }

      public function getcampanhas($id){
        if (campanhas::where('id', $id)->exists()) {
            $campanhas = campanhas::where('id', $id)->get()->toJson(JSON_PRETTY_PRINT);
            return response($campanhas, 200);
          } else {
            return response()->json([
              "message" => "campanhas not found"
            ], 404);
          }
      }

      public function createcampanhas(Request $request) {
        $campanhas = new campanhas;
        $campanhas->nome = $request->nome;
        $campanhas->save();

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
