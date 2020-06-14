<?php

namespace App\Http\Controllers\Resize;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
use App\Http\Controllers\Resize\Traits\ProcessImage;

class ResizeImageController extends Controller
{
    use ProcessImage;
    
    /**
     * Display the specified resource.
     *
     * @param  string $parameters
     * @return \Illuminate\Http\Response
     */
    public function show($parameters)
    {
        // Separa os parâmetros que identificam as caracteristicas que serão aplicadas
        // na imagem.
        $exploded = explode('&', $parameters);
        // Faz a validação do vetor de parâmetros.
        // [0] - O diretório onde está o arquivo a partir do disco público (codificado em base64)
        // [1] - A largura da imagem.
        // [2] - A altura da imagem, zero para auto.
        // [3] - O base name do aquivo no formato nome.extensão.
        if (count($exploded) !== 4) {
            return abort(404);
        }
        // Configura um vetor para processamento da imagem.
        $p = [
            0 => base64_decode($exploded[0]),
            1 => abs((int)$exploded[1]),
            2 => abs((int)$exploded[2]),
            3 => $exploded[3]
        ];
        // Verifica se o arquivo já foi criado, isso evita o processamento da imagem mais de uma vez.
        $path = $this->storagePath(...$p);
        if (Storage::disk('public')->exists($path)) {
            return response()->file(Storage::disk('public')->path($path));
        }
        // O caminho do arquivo original.
        $original = Storage::disk('public')->path($p[0] . '/' . $p[3]);
        // Retorna o arquivo.
        return response()->file($this->generate($original, $p));
    }
}
