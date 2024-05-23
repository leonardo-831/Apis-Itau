<?php

namespace App\Services\Boleto;

use GuzzleHttp\Client;
use GuzzleHttp\Exception\RequestException;

class AllBoletosService {

    public function execute($token)
    {
        $client = new Client();
        try{
            $response = $client->request(
                'GET',
                'https://devportal.itau.com.br/sandboxapi/cash_management_ext_v2/v2/boletos',
                [
                    'query' => [
                        'id_beneficiario' => '005526486598',
                    ],
                    'headers' => [
                        'x-sandbox-token' => $token,
                        'Accept' => 'application/json',
                    ],
                ]
            );
            $data = $response->getBody()->getContents();
            return json_decode($data, true);
        } catch (RequestException $e) {
            if ($e->hasResponse()) {
                $errorResponse = $e->getResponse()->getBody()->getContents();
                dd($errorResponse);
            }
        }
    }
}