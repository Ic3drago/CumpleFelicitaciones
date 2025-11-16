<?php

namespace App\Http\Controllers; // <-- Corregido (usaba '-')

use Illuminate\Http\Request; // <-- Corregido
use App\Models\Congratulation; // <-- Corregido
use Illuminate\Support\Str; // <-- Corregido
use Illuminate\Support\Facades\Mail; // <-- Corregido
use App\Mail\NuevaFelicitacionMail; // <-- Corregido
use Illuminate\Support\Facades\Log; // <-- Corregido

class CongratulationController extends Controller
{
    /**
     * Guarda la felicitación y envía el correo.
     */
    public function store(Request $request){
        
        $datosParaGuardar = [
            'name' => $request->name,
            'identificador' =>$request->identificador,
            'description' => $request->description,
            'status' => 1, // 1 = Pendiente de aprobación
            'img' => null, // Inicia 'img' como nulo por si falla
        ];

        // --- INICIO DE LA LÓGICA DE CLOUDINARY ---
        if ($request->hasFile("imagen")) {
            try {
                // Sube el archivo de imagen directamente a Cloudinary
                $uploadedFileUrl = cloudinary()->upload(
                    $request->file('imagen')->getRealPath(),
                    [
                        'folder' => 'felicitaciones-ninel', // Carpeta en Cloudinary
                        'transformation' => [
                            'width' => 800,
                            'height' => 800,
                            'crop' => 'limit'
                        ]
                    ]
                )->getSecurePath(); // Obtiene la URL segura (https://...)
                
                // Guarda la URL de Cloudinary en la base de datos
                $datosParaGuardar['img'] = $uploadedFileUrl;

            } catch (\Exception $e) {
                Log::error('Error al subir a Cloudinary: ' . $e->getMessage());
            }
        }
        // --- FIN DE LA LÓGICA DE CLOUDINARY ---

        // Crear el registro en la base de datos
        $c = Congratulation::create($datosParaGuardar);
        
        // --- INICIO DE LA LÓGICA DE CORREO ---
        try {
            Mail::to('avilagarciabenjamin@gmail.com') 
                ->send(new NuevaFelicitacionMail($c));
        } catch (\Exception $e) {
            Log::error("Fallo al enviar correo: " . $e->getMessage());
        }
        // --- FIN DE LA LÓGICA DE CORREO ---
        
        // Redirigir al usuario
        return redirect()->route('congratulations.index')->with('success', '¡Gracias, tu felicitación ha sido enviada!');
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