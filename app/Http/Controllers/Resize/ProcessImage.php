<?php

namespace App\Http\Controllers\Resize\Traits;

use Intervention\Image\Image;
use Intervention\Image\Facades\Image as Intervention;

trait ProcessImage
{
    /**
     * Retorna o caminho relativo ao `Storage::disk('public')` da imagem após ser processada
     *
     * @param string $dirname Diretório do arquivo original
     * @param string|int $width
     * @param string|int $height
     * @param string $basename Nome do arquivo original incluindo a extensão
     * @return string
     */
    private function storagePath($dirname, $width, $height, $basename)
    {
        return sprintf('%s/__%d__%d__%s', $dirname, $width, $height, $basename);
    }

    /**
     * Processa a imagem com as características desejadas.
     *
     * @param Image $image
     * @param int $width
     * @param int $height
     * @return string
     */
    private function process(Image $image, $width = 300, $height = null)
    {
        // Corta e redimenciona a imagem.
        $image->fit($width, $height, function ($constraint) {
            $constraint->upsize();
        });
        // Salva a imagem
        $path = $this->storagePath($image->dirname, $width, $height, $image->basename);
        $image->save($path);
        // Retorna o nome do arquivo.
        return $image->dirname . '/' . $image->basename;
    }

    /**
     * Abre a imagem para processamento.
     *
     * @param $path
     * @param array $parameters
     * @return bool|string
     */
    public function generate($path, array $parameters)
    {
        try {
            // Tenta criar uma imagem a partir do arquivo no disco.
            $image = Intervention::make($path);
            // Verificação de parâmetros.
            $width = $parameters[1] ? $parameters[1] : 300;
            $height = $parameters[2] ? $parameters[2] : null;
            // Processa a imagem de acordo com os parâmetros.
            return $this->process($image, $width, $height);
        } catch (\Exception $exception) {
            return abort(404);
        }
    }
}
