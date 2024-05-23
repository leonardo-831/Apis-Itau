<?php

namespace App\Services\Pix;

use GuzzleHttp\Client;
use GuzzleHttp\Exception\RequestException;

class PixGenerateService
{
    public function execute($token)
    {
        $client = new Client();
        try {
            $response = $client->request(
                'POST',
                'https://devportal.itau.com.br/sandboxapi/itau-ep9-gtw-pix-recebimentos-ext-v2/v2/cob',
                [
                    'headers' => [
                        'x-sandbox-token' => $token,
                        'Content-Type' => 'application/json',
                        'Accept' => 'application/json',
                    ],
                    'json' => [
                        'valor' => [
                            'original' => '23.45'
                        ],
                        'chave' => '60701190000104'
                    ]
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
