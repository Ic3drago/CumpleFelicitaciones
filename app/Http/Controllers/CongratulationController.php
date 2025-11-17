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
     * Guarda la felicitación y envía el correo (MODO DEBUG).
     */
    public function store(Request $request){
        
        // 1. Validación: Aceptamos imágenes Y videos hasta 50MB (51200 KB)
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

        // --- INICIO DE LA LÓGICA DE CLOUDINARY ---
        if ($request->hasFile("imagen")) {
            try {
                // Sube el archivo a Cloudinary y lo fuerza a MP4 si es video
                $uploadedFileUrl = cloudinary()->upload(
                    $request->file('imagen')->getRealPath(),
                    [
                        'folder' => 'felicitaciones-ninel', 
                        'resource_type' => 'auto', 
                        'format' => 'mp4', // Evita errores de reproducción
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
        
        // --- TRAMPA PARA VER EL ERROR DE EMAIL ---
        // Esto detendrá la página si el correo falla y te mostrará el error
        try {
            Mail::to('avilagarciabenjamin@gmail.com') 
                ->send(new NuevaFelicitacionMail($c));
        } catch (\Exception $e) {
            // ¡ESTA LÍNEA TE DIRÁ QUÉ ESTÁ PASANDO!
            dd("🛑 ERROR CRÍTICO DE EMAIL: " . $e->getMessage());
        }
        // -----------------------------------------
        
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