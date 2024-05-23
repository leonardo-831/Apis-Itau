<?php

namespace App\Services\Boleto;

use Carbon\Carbon;
use Eduardokum\LaravelBoleto\Boleto\Banco\Itau;

class GenerateBoletoService {

    public function execute($data)
    {
        $boleto = $data['data'][0];
        $enderecoBeneficiario = $boleto['beneficiario']['endereco'];
        $enderecoPagador = $boleto['dado_boleto']['pagador']['endereco'];

        $beneficiario = new \Eduardokum\LaravelBoleto\Pessoa([
            'documento' => $boleto['beneficiario']['tipo_pessoa']['numero_cadastro_nacional_pessoa_juridica'],
            'nome'      => $boleto['beneficiario']['nome_cobranca'],
            'cep'       => $enderecoBeneficiario['numero_CEP'],
            'endereco'  => $enderecoBeneficiario['nome_logradouro'],
            'bairro' => $enderecoBeneficiario['nome_bairro'],
            'uf'        => $enderecoBeneficiario['sigla_UF'],
            'cidade'    => $enderecoBeneficiario['nome_cidade'],
        ]);
        
        $pagador = new \Eduardokum\LaravelBoleto\Pessoa([
            'documento' => '00.000.000/0000-00',
            'nome'      => $boleto['dado_boleto']['pagador']['pessoa']['nome_pessoa'],
            'cep'       => $enderecoPagador['numero_CEP'],
            'endereco'  => $enderecoPagador['nome_logradouro'],
            'bairro' => $enderecoPagador['nome_bairro'],
            'uf'        => $enderecoPagador['sigla_UF'],
            'cidade'    => $enderecoPagador['nome_cidade'],
        ]);
        
        //dd($boleto['dado_boleto']);

        $itau = new Itau([
            //'logo' => '/path/to/logo.png',
            'dataVencimento' => new Carbon('1997-10-07'),
            'valor' => 100,
            'numero' => 1,
            'numeroDocumento' => 1,
            'pagador' => $pagador,
            'beneficiario' => $beneficiario,
            'carteira' => 109,
            'agencia' => 1111,
            'conta' => 22222,
            'multa' => 1, // 1% do valor do boleto após o vencimento
            'juros' => 1, // 1% ao mês do valor do boleto
            'jurosApos' => 0, // quant. de dias para começar a cobrança de juros,
            'descricaoDemonstrativo' => ['demonstrativo 1', 'demonstrativo 2', 'demonstrativo 3'],
            'instrucoes' => ['instrucao 1', 'instrucao 2', 'instrucao 3'],
        ]);
        return $itau;
        //dd($itau);
    }
}