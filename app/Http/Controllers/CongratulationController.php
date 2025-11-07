<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Congratulation;
use Illuminate\Support\Str;

class CongratulationController extends Controller
{
    public function store(Request $request){
        if($request->hasFile("imagen")){
            $imagen = $request->file("imagen");
            $nombreImagen = Str::slug($request->name).".".$imagen->guessExtension();
            $ruta = public_path("/assets/img/felicitaciones/");
            $imagen->move($ruta,$nombreImagen);
            $c = Congratulation::create([
                'name' => $request->name,
                'identificador' =>$request->identificador,
                'description' => $request->description,
                'img' => $nombreImagen,
                'status' => 1,
            ]);
        }else{
            $c = Congratulation::create([
                'name' => $request->name,
                'identificador' =>$request->identificador,
                'description' => $request->description,
                'status' => 1,
            ]);
        }
        
        return redirect()->route('congratulations.index');
     }

     public function destroy($id){
        Congratulation::where('id',$id)->update([
            'status' => 1,
        ]);
            return "succes";
    }

    public function aceptar($id){
        Congratulation::where('id',$id)->update([
            'status' => 2,
        ]);
            return "succes";

    }
}
