<?php

namespace App\Services;

use GuzzleHttp\Client;

class ItauService
{
    protected $client;
    protected $token;

    public function __construct()
    {
        $this->client = new Client([
            'base_uri' => config('app.env') === 'production' ? env('ITAU_API_URL') : env('ITAU_SANDBOX_URL'),
        ]);
    }

    public function authenticate()
    {
        $client2 = new Client();
        $response = $client2->post('https://sandbox.devportal.itau.com.br/api/oauth/jwt', [
            'auth' => [env('ITAU_CLIENT_ID'), env('ITAU_CLIENT_SECRET')],
            'form_params' => [
                'grant_type' => 'client_credentials'
            ],
        ]);

        $data = json_decode($response->getBody()->getContents(), true);
        $this->token = $data['access_token'];
    }

    public function getToken()
    {
        if (!$this->token) {
            $this->authenticate();
        }

        return $this->token;
    }

    public function createPixCharge($valor, $cpf, $nome, $descricao, $token)
    {
        $response = $this->client->post('/sandboxapi/itau-ep9-gtw-pix-recebimentos-ext-v2/v2/cob', [
            'headers' => [
                //'Authorization' => 'Bearer ' . $this->getToken(),
                'x-sandbox-token' => $token,
                'Content-Type' => 'application/json',
            ],
            'json' => [
                'calendario' => ['expiracao' => 3600],
                'devedor' => ['cpf' => $cpf, 'nome' => $nome],
                'valor' => ['original' => number_format($valor, 2, '.', '')],
                'chave' => 'sua-chave-pix',
                'solicitacaoPagador' => $descricao,
            ],
        ]);
        dd($response);
        return json_decode($response->getBody()->getContents(), true);
    }
}