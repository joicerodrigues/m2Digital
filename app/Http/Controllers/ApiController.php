<?php

namespace App\Http\Controllers;

use App\Models\Cidades as Cidades;
use App\Http\Resources\Cidades as CidadesResource;
use Illuminate\Http\Request;


class ApiController extends Controller
{  
      public function getAllCidades(){
        $Cidades = Cidades::get()->toJson(JSON_PRETTY_PRINT);
        return response($Cidades, 200);
      }

      public function getCidades($id){
        if (Cidades::where('id', $id)->exists()) {
          $Cidades = Cidades::where('id', $id)->get()->toJson(JSON_PRETTY_PRINT);
          return response($Cidades, 200);
        } else {
          return response()->json([
            "message" => "Cidades not found"
          ], 404);
        }
      }

      public function createCidades(Request $request) {
        $Cidades = new Cidades;
        $Cidades->nome = $request->nome;
        $Cidades->estado = $request->estado;
        $Cidades->save();

        return response()->json(
          [
            "message" => "Cadastrado com sucesso!"
          ], 201
        );
      }
      public function updateCidades(Request $request, $id){
        if (Cidades::where('id', $id)->exists()) {
          $Cidades = Cidades::find($id);
          $Cidades->nome = is_null($request->nome) ? $Cidades->nome : $request->nome;
          $Cidades->estado = is_null($request->estado) ? $Cidades->estado : $request->estado;
          $Cidades->save();
  
          return response()->json([
              "message" => "records updated successfully"
          ], 200);
          } else {
          return response()->json([
              "message" => "Cidades not found"
          ], 404);
          
      }
      } 
    
      public function deleteCidades($id){
        if(Cidades::where('id', $id)->exists()) {
          $Cidades = Cidades::find($id);
          $Cidades->delete();
  
          return response()->json([
            "message" => "records deleted"
          ], 202);
        } else {
          return response()->json([
            "message" => "Cidades not found"
          ], 404);
        }
      }
}
  

