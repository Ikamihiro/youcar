<?php

namespace App\Http\Controllers\Cms;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Veiculo;

class ImportController extends Controller
{
    public function sincronizar(Request $request)
    {
        // URI de onde os dados vão ser importados
        $urlArquivo = 'http://aws.it-car.com.br/xml/exporta-itcar.asp?site=youcar.itcar.com.br';

        // Pega e decodifica o arquivo XML
        $xmldata = simplexml_load_file($urlArquivo);
        foreach($xmldata->Veiculo as $veiculo) {}
    }
}
