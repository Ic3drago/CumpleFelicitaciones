<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <style>
        body { font-family: sans-serif; color: #333; }
        .box { padding: 20px; border: 1px solid #ddd; border-radius: 8px; background: #f9f9f9; }
        h2 { color: #d63384; }
        .footer { margin-top: 20px; font-size: 12px; color: #888; }
    </style>
</head>
<body>
    <div class="box">
        <h2>¡Nueva Felicitación para Ninel! 🎉</h2>
        <p><strong>De:</strong> {{ $felicitacion->name }} ({{ $felicitacion->identificador }})</p>
        
        <p><strong>Mensaje:</strong></p>
        <p style="font-style: italic; background: white; padding: 15px; border-radius: 5px; border-left: 4px solid #d63384;">
            "{{ $felicitacion->description }}"
        </p>

        @if($felicitacion->img)
            <p>📷 <strong>Adjuntó un archivo multimedia:</strong> <a href="{{ $felicitacion->img }}" target="_blank">Ver archivo</a></p>
        @endif

        <div class="footer">
            <hr>
            <p>Esta felicitación ya se publicó automáticamente en la página web.</p>
        </div>
    </div>
</body>
</html>