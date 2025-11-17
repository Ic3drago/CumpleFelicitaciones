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
        
        // 1. Validación: Aceptamos imágenes Y videos
        $request->validate([
            'name' => 'required|string|max:255',
            'identificador' => 'required|string|max:255',
            'description' => 'required|string',
            // Acepta jpg, png, gif, webp Y TAMBIÉN mp4, mov, avi, webm. Máximo 50MB (51200 KB)
            'imagen' => 'nullable|file|mimes:jpeg,png,jpg,gif,webp,mp4,mov,avi,webm|max:51200',
        ]);
        
        $datosParaGuardar = [
            'name' => $request->name,
            'identificador' =>$request->identificador,
            'description' => $request->description,
            'status' => 2, // Aprobado automáticamente
            'img' => null, 
        ];

        // --- INICIO DE LA LÓGICA DE CLOUDINARY ---
        if ($request->hasFile("imagen")) {
            try {
                // Sube el archivo (foto o video) a Cloudinary
                $uploadedFileUrl = cloudinary()->upload(
                    $request->file('imagen')->getRealPath(),
                    [
                        'folder' => 'felicitaciones-ninel', 
                        'resource_type' => 'auto', // <--- ¡CLAVE! Detecta si es video o imagen automáticamente
                    ]
                )->getSecurePath(); 
                
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