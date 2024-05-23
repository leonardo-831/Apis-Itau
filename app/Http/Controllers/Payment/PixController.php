<?php

namespace App\Http\Controllers\Payment;

use Illuminate\Http\Request;
use App\Services\ItauService;
use App\Http\Controllers\Controller;
use SimpleSoftwareIO\QrCode\Facades\QrCode;

class PixController extends Controller
{
    protected $itauService;

    public function __construct(ItauService $itauService)
    {
        $this->itauService = $itauService;
    }

    public function createCharge(Request $request)
    {
        $data = $this->itauService->createPixCharge(
            $request->input('valor'),
            $request->input('cpf'),
            $request->input('nome'),
            $request->input('descricao'),
            $request->input('token')
        );

        /* $pixCopiaECola = $response['pixCopiaECola'];
        $qrCode = QrCode::size(300)->generate($pixCopiaECola);
        
        return view('qrcode', [
            'qrCode' => $qrCode,
            'valor' => $response['valor']['original'],
            'nomeDevedor' => $response['devedor']['nome'],
            'cnpjDevedor' => $response['devedor']['cnpj'],
            'pixCopiaECola' => $pixCopiaECola
        ]); */

        return view('qrcode', ['data' => $data]);
    }
}
