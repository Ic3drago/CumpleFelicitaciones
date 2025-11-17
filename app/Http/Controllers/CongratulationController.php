<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Congratulation;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Mail;
use App\Mail\NuevaFelicitacionMail;
use Illuminate\Support\Facades\Log;

class CongratulationController extends Controller
{
    /**
     * Guarda la felicitación (foto o video) y envía el correo.
     */
    public function store(Request $request){
        
        // 1. Validación: Aceptamos imágenes Y videos hasta 50MB
        $request->validate([
            'name' => 'required|string|max:255',
            'identificador' => 'required|string|max:255',
            'description' => 'required|string',
            'imagen' => 'nullable|file|mimes:jpeg,png,jpg,gif,webp,mp4,mov,avi,webm|max:51200',
        ]);
        
        $datosParaGuardar = [
            'name' => $request->name,
            'identificador' =>$request->identificador,
            'description' => $request->description,
            'status' => 2, // Aprobado automáticamente
            'img' => null, 
        ];

        // --- LÓGICA DE CLOUDINARY ---
        if ($request->hasFile("imagen")) {
            try {
                // Sube el archivo a Cloudinary y lo fuerza a MP4 si es video
                $uploadedFileUrl = cloudinary()->upload(
                    $request->file('imagen')->getRealPath(),
                    [
                        'folder' => 'felicitaciones-ninel', 
                        'resource_type' => 'auto', 
                        'format' => 'mp4', // Convierte a MP4 para compatibilidad
                    ]
                )->getSecurePath(); 
                
                $datosParaGuardar['img'] = $uploadedFileUrl;

            } catch (\Exception $e) {
                Log::error('Error al subir a Cloudinary: ' . $e->getMessage());
            }
        }

        // Crear el registro en la base de datos
        $c = Congratulation::create($datosParaGuardar);
        
        // --- LÓGICA DE CORREO (LIMPIA) ---
        try {
            Mail::to('avilagarciabenjamin@gmail.com') 
                ->send(new NuevaFelicitacionMail($c));
        } catch (\Exception $e) {
            // Si falla, guardamos el error en el log interno pero NO detenemos la página
            Log::error("Fallo al enviar correo: " . $e->getMessage());
        }
        
        // Redirigir al usuario con éxito
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