<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class descontosController extends Controller
{
    
    public function getAlldescontos(){
        $descontos = descontos::get()->toJson(JSON_PRETTY_PRINT);
        return response($descontos, 200);
      }

      public function getdescontos($id){
        if (descontos::where('id', $id)->exists()) {
            $descontos = descontos::where('id', $id)->get()->toJson(JSON_PRETTY_PRINT);
            return response($descontos, 200);
          } else {
            return response()->json([
              "message" => "descontos not found"
            ], 404);
          }
      }

      public function createdescontos(Request $request) {
        $descontos = new descontos;
        $descontos->nome = $request->nome;
        $descontos->save();

        return response()->json(
            [
                "message" => "Cadastrado com sucesso!"
            ], 201
        );
      }
      public function updatedescontos(Request $request, $id){
        if (descontos::where('id', $id)->exists()) {
            $descontos = descontos::find($id);
            $descontos->nome = is_null($request->nome) ? $descontos->nome : $request->nome;
            $descontos->save();
    
            return response()->json([
                "message" => "records updated successfully"
            ], 200);
            } else {
            return response()->json([
                "message" => "descontos not found"
            ], 404);
            
        }
      } 
    
      public function deletedescontos($id){
        if(descontos::where('id', $id)->exists()) {
            $descontos = descontos::find($id);
            $descontos->delete();
    
            return response()->json([
              "message" => "records deleted"
            ], 202);
          } else {
            return response()->json([
              "message" => "descontos not found"
            ], 404);
          }
     }
}
