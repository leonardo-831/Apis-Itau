<?php

namespace App\Http\Controllers\Payment;

use Illuminate\Http\Request;
use App\Services\ItauService;
use App\Http\Controllers\Controller;

class PaymentController extends Controller {
    protected $itauService;

    public function __construct(ItauService $itauService)
    {
        $this->itauService = $itauService;
    }

    /* public function boleto(Request $request)
    {
        $response = $this->allBoletos->execute($request->token);
        $boletoPDF = $this->generateBoleto->execute($response);

        return response($boletoPDF->renderPDF(false, false), 200, [
            'Content-Type' => 'application/pdf',
            'Content-Disposition' => 'inline; boleto.pdf',
        ]);
    } */
}